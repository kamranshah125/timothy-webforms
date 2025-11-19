<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\FormSubmission;
use App\Models\User;
use App\Services\FormScoreService;
use App\Services\FormPdfService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\CompletionMail;
use App\Mail\RegistrationMail;

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
        $this->config = config("forms.{$this->formType}") ?? [];

        $this->totalSteps = $this->config['steps'] ?? count($this->config['pages'] ?? []) ?: 1;

        // If token provided -> resume mode (load submission by token)
        if ($token) {
            $submission = FormSubmission::where('resume_token', $token)->first();
            if (! $submission) {
                abort(403, 'Invalid or expired link.');
            }

            // auto-login if submission attached to a user
            if (! Auth::check() && $submission->user_id) {
                Auth::loginUsingId($submission->user_id);
            }

            $this->submission = $submission;
            $this->allData = $submission->form_data ?? [];
            $this->step = max(1, (int)($submission->current_step ?? 1));
            $this->data = $this->allData["page{$this->step}"] ?? [];
            return;
        }

        // No token (public entry) — allow access to page 1 without login
        if (Auth::check()) {
            // If user logged in, reuse or create a draft submission for them
            $submission = FormSubmission::firstOrCreate(
                ['user_id' => Auth::id(), 'form_type' => $this->formType, 'status' => 'draft'],
                ['form_name' => $this->config['title'] ?? ucfirst($this->formType), 'resume_token' => (string) Str::uuid()]
            );

            $this->submission = $submission;
            $this->allData = $submission->form_data ?? [];
            $this->step = max(1, (int)($submission->current_step ?? 1));
            $this->data = $this->allData["page{$this->step}"] ?? [];
            return;
        }

        // Public anonymous user — start on step 1 with empty state
        $this->submission = null;
        $this->allData = [];
        $this->step = 1;
        $this->data = [];
    }

    protected function currentPageConfig()
    {
        if (! $this->config) return null;
        return $this->config['pages']['page' . $this->step] ?? null;
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
                if (in_array($type, ['text', 'textarea', 'radio', 'radio-score', 'date'])) $r[] = 'string';
                $r[] = 'required';
                $rules["data.{$name}"] = implode('|', $r);
            }
        }
        return $rules;
    }

    /**
     * Create or reuse user + submission.
     *
     * @param  bool  $generatePasswordAndSendEmail  If true, generate password and send registration email immediately.
     * @return array [User $user, FormSubmission $submission, $generatedPassword|null]
     */
    protected function createOrReuseUserAndSubmission(bool $generatePasswordAndSendEmail = false): array
    {
        // Try to get email and name from page1 data
        $page1 = $this->allData['page1'] ?? [];
        $page1 = array_merge($page1, $this->step === 1 ? $this->data : []); // ensure current data included if on page1

        $email = $page1['email'] ?? null;
        $name  = $page1['full_name'] ?? $page1['name'] ?? null;

        if (! $email) {
            // If no email provided, can't create user. Return nulls so caller can handle validation earlier.
            return [null, null, null];
        }

        // Check existing user by email
        $user = User::where('email', $email)->first();

        $generatedPassword = null;

        if (! $user) {
            // Create user (no password yet)
            $user = User::create([
                'name' => $name ?? explode('@', $email)[0],
                'email' => $email,
                // leave password null for now - will set on save-progress if requested
            ]);
        }

        // Find existing draft submission for this user & formType
        $submission = FormSubmission::where('user_id', $user->id)
            ->where('form_type', $this->formType)
            ->where('status', 'draft')
            ->first();

        if (! $submission) {
            $submission = FormSubmission::create([
                'user_id' => $user->id,
                'form_type' => $this->formType,
                'form_name' => $this->config['title'] ?? ucfirst($this->formType),
                'form_data' => $this->allData ?: [],
                'status' => 'draft',
                'resume_token' => (string) Str::uuid(),
            ]);
        } else {
            // ensure it has a resume_token
            if (empty($submission->resume_token)) {
                $submission->resume_token = (string) Str::uuid();
                $submission->save();
            }
        }

        // If caller requested, generate password (only if user has none)
        if ($generatePasswordAndSendEmail) {
            if (empty($user->password)) {
                $generatedPassword = Str::random(8);
                $user->update(['password' => Hash::make($generatedPassword)]);
            }
            // Send registration/save-progress email (RegistrationMail accepts $user, $link, $password = null)
            $link = route('form.start', ['formType' => $this->formType, 'token' => $submission->resume_token]);
            Mail::to($user->email)->send(new RegistrationMail($user, $link, $generatedPassword));
        }

        return [$user, $submission, $generatedPassword];
    }

    // public function saveStep()
    // {
    //     $page = $this->currentPageConfig();
    //     $fields = $page['fields'] ?? [];

    //     // Validate
    //     $rules = $this->buildValidationRules($fields);
    //     if (!empty($rules)) {
    //         $this->validate($rules);
    //     }

    //     // Normalize checkboxes
    //     $this->normalizeCheckboxGroups($fields);

    //     // STEP 1 — Ensure user exists
    //     $email = $this->data['email'] ?? null;
    //     $name  = $this->data['name'] ?? ($this->data['full_name'] ?? null);

    //     if ($email) {
    //         $user = \App\Models\User::where('email', $email)->first();

    //         if (! $user) {
    //             // Create new user (Case A)
    //             $password = Str::random(8);

    //             $user = \App\Models\User::create([
    //                 'name' => $name,
    //                 'email' => $email,
    //                 'password' => Hash::make($password),
    //             ]);

    //             $newAccount = true;
    //         } else {
    //             $newAccount = false;
    //             $password = null;
    //         }

    //         Auth::login($user);
    //     }

    //     // STEP 2 — Ensure submission exists
    //     if (! $this->submission) {
    //         $this->submission = FormSubmission::create([
    //             'user_id'      => $user->id ?? null,
    //             'form_type'    => $this->formType,
    //             'form_name'    => $this->config['title'] ?? ucfirst($this->formType),
    //             'form_data'    => [],
    //             'status'       => 'draft',
    //             'resume_token' => (string) Str::uuid(),
    //             'email_sent'   => false,
    //         ]);
    //     }

    //     // Save page data
    //     $this->allData["page{$this->step}"] = $this->data;

    //     $this->submission->update([
    //         'form_data'     => $this->allData,
    //         'current_step'  => $this->step,
    //         'user_id'       => $user->id ?? $this->submission->user_id,
    //     ]);

    //     // STEP 3 — Send email ONLY first time
    //     if (! $this->submission->email_sent && $email) {

    //         $resumeLink = route('form.start', [
    //             'formType' => $this->formType,
    //             'token'    => $this->submission->resume_token
    //         ]);

    //         // if new user → send password too
    //         Mail::to($email)->send(
    //             new \App\Mail\RegistrationMail($user, $resumeLink, $password)
    //         );

    //         $this->submission->update(['email_sent' => true]);
    //     }

    //     $this->dispatch('notify', message: 'Saved');
    // }

    public function saveProgress()
    {
        // Always save current step data first
        $this->saveStep();

        // get email + name from page1
        $page1 = $this->allData['page1'] ?? [];
        $email = $page1['email'] ?? null;
        $name  = $page1['full_name'] ?? null;

        if (! $email) {
            $this->addError('data.email', 'Email is required to send progress.');
            return;
        }

        // Find user (existing or new)
        $user = User::where('email', $email)->first();
        $password = null;

        // -----------------------------------------
        // 🚨 **CASE 1: User exists AND email already sent**
        // -----------------------------------------
        if ($user && $this->submission->email_sent) {

            // just attach user if missing
            if ($this->submission->user_id !== $user->id) {
                $this->submission->update(['user_id' => $user->id]);
            }

            // no password regeneration, no email resend
            $this->dispatch('notify', message: 'Progress saved!');
            return;
        }

        // -----------------------------------------
        // 🚨 **CASE 2: Existing user but email not sent yet**
        // → send email with new password
        // -----------------------------------------
        if ($user && ! $this->submission->email_sent) {

            // generate a NEW password only this one time
            $password = Str::random(8);
            $user->update([
                'password' => Hash::make($password)
            ]);

            // attach user to submission if missing
            $this->submission->update(['user_id' => $user->id]);

            // send email
            $link = route('form.start', [
                'formType' => $this->formType,
                'token'    => $this->submission->resume_token
            ]);

            Mail::to($email)->send(new RegistrationMail($user, $link, $password));

            // mark email sent
            $this->submission->update(['email_sent' => true]);

            $this->dispatch('notify', message: 'Progress saved & email sent!');
            return;
        }

        // -----------------------------------------
        // 🚨 **CASE 3: User does NOT exist**
        // → create user + send email
        // -----------------------------------------
        if (! $user) {
            $password = Str::random(8);

            $user = User::create([
                'name' => $name ?? explode('@', $email)[0],
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            // attach new user
            $this->submission->update(['user_id' => $user->id]);

            // send email
            $link = route('form.start', [
                'formType' => $this->formType,
                'token'    => $this->submission->resume_token
            ]);

            Mail::to($email)->send(new RegistrationMail($user, $link, $password));

            // update submission
            $this->submission->update(['email_sent' => true]);

            $this->dispatch('notify', message: 'Progress saved & email sent!');
            return;
        }
    }


    public function saveStep()
    {
        $page = $this->currentPageConfig();
        $fields = $page['fields'] ?? [];

        // Validate
        $rules = $this->buildValidationRules($fields);
        if (!empty($rules)) {
            $this->validate($rules);
        }

        // Normalize checkboxes
        $this->normalizeCheckboxGroups($fields);

        // If no submission yet → DO NOT SEND EMAIL
        if (! $this->submission) {
            // create empty submission (no email)
            $this->submission = FormSubmission::create([
                'user_id'      => Auth::id(),
                'form_type'    => $this->formType,
                'form_name'    => $this->config['title'] ?? ucfirst($this->formType),
                'form_data'    => [],
                'status'       => 'draft',
                'resume_token' => (string) Str::uuid(),
                'email_sent'   => false,
            ]);
        }

        // Save page data
        $this->allData["page{$this->step}"] = $this->data;

        $this->submission->update([
            'form_data' => $this->allData,
            'current_step' => $this->step,
        ]);
    }



    public function next()
    {
        // If we are at the first step and there is no submission yet, create user+submission but DO NOT send password/email.
        if ($this->step === 1 && ! $this->submission) {
            $page = $this->currentPageConfig();
            $fields = $page['fields'] ?? [];

            // validate page1 fields before creating user/submission
            $rules = $this->buildValidationRules($fields);
            if (!empty($rules)) $this->validate($rules);

            // normalize checkboxes
            $this->normalizeCheckboxGroups($fields);

            // Merge page1 data into allData
            $this->allData["page{$this->step}"] = $this->data;

            // create user & submission but DO NOT send email (generatePassword=false)
            [$user, $submission, $pw] = $this->createOrReuseUserAndSubmission(false);

            if (! $user || ! $submission) {
                $this->addError('data.email', 'Email is required to continue.');
                return;
            }

            // Update submission with page1 content
            $submission->update([
                'form_data' => $this->allData,
                'current_step' => $this->step,
                'status' => 'draft',
            ]);

            // Redirect to tokened URL so rest of flow uses submission token
            return redirect()->route('form.start', ['formType' => $this->formType, 'token' => $submission->resume_token]);
        }

        // Normal next when submission exists
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
        if ($n >= 1 && $n <= $this->totalSteps) {
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
            // keep resume_token so admin/user could revisit if needed; you can set to null to invalidate
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
