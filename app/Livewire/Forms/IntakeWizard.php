<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\FormSubmission;
use App\Services\FormScoreService;
use App\Services\FormPdfService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompletionMail;


class IntakeWizard extends Component
{
 
    public $formType;
    public $token;
    public $submission;
    public $config;
    public $step = 1;
    public $totalSteps = 1;
    public $data = []; // current step values
    public $allData = []; // all saved form_data (page1, page2...)

    public function mount($formType, $token = null)
    {
        $this->formType = $formType;
        $this->token = $token;
        $this->config = config("forms.{$this->formType}");

        // fallback: if no config, you can still use manual fields in blade
        $this->totalSteps = $this->config['steps'] ?? count($this->config['pages'] ?? []) ?: 1;

        // If token provided -> load submission by token
        if ($token) {
            $submission = FormSubmission::where('resume_token', $token)->first();
            if (! $submission) {
                abort(403, 'Invalid or expired link.');
            }
            // optional: auto-login
            if (! Auth::check() && $submission->user_id) {
                Auth::loginUsingId($submission->user_id);
            }
            $this->submission = $submission;
            $this->allData = $submission->form_data ?? [];
            $this->step = max(1, $submission->current_step ?? 1);
            $this->data = $this->allData["page{$this->step}"] ?? [];
            return;
        }

        // If user logged in, get or create draft
        if (Auth::check()) {
            $submission = FormSubmission::firstOrCreate(
                ['user_id' => Auth::id(), 'form_type' => $this->formType, 'status' => 'draft'],
                ['form_name' => $this->config['title'] ?? ucfirst($this->formType), 'resume_token' => (string) Str::uuid()]
            );

            $this->submission = $submission;
            $this->allData = $submission->form_data ?? [];
            $this->step = max(1, $submission->current_step ?? 1);
            $this->data = $this->allData["page{$this->step}"] ?? [];
            return;
        }

        // no token & not logged in -> block
        abort(403, 'Access requires token or login.');
    }

    protected function currentPageConfig()
    {
        if (! $this->config) return null;
        return $this->config['pages']['page'.$this->step] ?? null;
    }

    protected function normalizeCheckboxGroups(array $pageFields)
    {
        // normalize checkbox-group values from associative -> array of keys
        foreach ($pageFields as $field) {
            if (($field['type'] ?? '') === 'checkbox-group') {
                $name = $field['name'];
                if (isset($this->data[$name]) && is_array($this->data[$name])) {
                    $selected = [];
                    foreach ($this->data[$name] as $k => $v) {
                        if ($v) $selected[] = $k;
                    }
                    $this->data[$name] = $selected;
                }
            }
        }
    }

    protected function buildValidationRules(array $pageFields): array
    {
        $rules = [];
        foreach ($pageFields as $field) {
            if (!empty($field['required'])) {
                $name = $field['name'];
                $type = $field['type'] ?? 'text';
                $r = [];
                if ($type === 'email') $r[] = 'email';
                if ($type === 'number') $r[] = 'numeric';
                if (in_array($type, ['text','textarea','radio','radio-score','date'])) $r[] = 'string';
                $r[] = 'required';
                $rules["data.{$name}"] = implode('|', $r);
            }
        }
        return $rules;
    }

    public function saveStep()
    {
        $page = $this->currentPageConfig();
        $fields = $page['fields'] ?? [];

        // build validation rules dynamically if config exists
        $rules = $this->buildValidationRules($fields);
        if (!empty($rules)) $this->validate($rules);

        // normalize checkbox groups before saving
        $this->normalizeCheckboxGroups($fields);

        // ensure submission record
        if (! $this->submission) {
            $this->submission = FormSubmission::create([
                'user_id' => Auth::id() ?? null,
                'form_type' => $this->formType,
                'form_name' => $this->config['title'] ?? ucfirst($this->formType),
                'form_data' => [],
                'status' => 'draft',
                'resume_token' => (string) Str::uuid(),
            ]);
        }

        // merge into allData keyed by page
        $this->allData["page{$this->step}"] = $this->data;

        $this->submission->update([
            'form_data' => $this->allData,
            'current_step' => $this->step,
        ]);

       $this->dispatch('notify', message: 'Saved');
    }

    public function next()
    {
        $this->saveStep();
        if ($this->step < $this->totalSteps) {
            $this->step++;
            $this->data = $this->allData["page{$this->step}"] ?? [];
            return;
        }
        // last step -> complete
        $this->complete();
    }

    public function prev()
    {
        if ($this->step > 1) {
            $this->step--;
            $this->data = $this->allData["page{$this->step}"] ?? [];
        }
    }

    public function goTo($n)
    {
        if ($n >=1 && $n <= $this->totalSteps) {
            $this->step = $n;
            $this->data = $this->allData["page{$this->step}"] ?? [];
        }
    }

    public function complete()
    {
        // final save
        $this->saveStep();

        // calculate scores using service (expects array)
        $scores = app(FormScoreService::class)->calculate($this->submission->form_data ?? []);

        $this->submission->update([
            'section_scores' => $scores,
            'total_score' => array_sum($scores),
            'status' => 'completed',
            'resume_token' => null, // optional: invalidate
        ]);

        // generate PDF and update
        $pdfPath = app(FormPdfService::class)->generate($this->submission);

        // send completion mail(s)
        if ($this->submission->user && $this->submission->user->email) {
            Mail::to($this->submission->user->email)->send(new CompletionMail($this->submission));
        }
        // Mail::to('info@neurofitconnections.com')->send(new CompletionMail($this->submission));

        // redirect to a thank you view (route add in web.php)
        return redirect()->route('form.complete.thankyou', ['formType' => $this->formType]);
    }

    public function render()
    {
        return view('livewire.forms.intake-wizard', [
            'pageConfig' => $this->currentPageConfig(),
        ]);
    }
}
