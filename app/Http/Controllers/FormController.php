<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;
use App\Services\FormScoreService;
use App\Services\FormPdfService;
use App\Mail\CompletionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    
    // 🧭 Show any form step dynamically (supports token link)
    public function showExmaple()
    {
        return view("test");
    }
    public function showStep($formType, $step, Request $request)
    {
  
        // token from email link
        $token = $request->query('token');

        // Agar user login nahi aur token aya hai
        if (!Auth::check() && $token) {
            $submission = FormSubmission::where('resume_token', $token)->first();

            if ($submission) {
                Auth::loginUsingId($submission->user_id);
            } else {
                abort(403, 'Invalid or expired access link.');
            }
        }

        // Get draft submission
        $submission = FormSubmission::firstOrCreate([
            'user_id' => auth()->id(),
            'form_type' => $formType,
            'status' => 'draft',
        ], [
            'form_name' => ucfirst(str_replace('-', ' ', $formType)),
        ]);

        // Dynamically load config
        $configKey = "forms.{$formType}.page{$step}";
        if (!config()->has($configKey)) {
            abort(404, "Form page not found for {$formType}, step {$step}");
        }

        $fields = config($configKey);
        $data   = $submission->form_data["page{$step}"] ?? [];

        return view("form.{$formType}.step{$step}", compact('fields', 'data', 'step', 'formType'));
    }

    // 💾 Save step data
    public function saveStep(Request $request, $formType, $step)
    {
        $submission = FormSubmission::where('user_id', auth()->id())
            ->where('form_type', $formType)
            ->where('status', 'draft')
            ->firstOrFail();

        $data = $submission->form_data ?? [];
        $data["page{$step}"] = $request->except('_token');

        $submission->update([
            'form_data' => $data,
            'current_step' => $step,
        ]);

        return redirect()->route('form.step', [
            'formType' => $formType,
            'step'     => $step + 1,
        ]);
    }

    // ✅ Complete form
    public function complete($formType)
    {
        $submission = FormSubmission::where('user_id', auth()->id())
            ->where('form_type', $formType)
            ->where('status', 'draft')
            ->firstOrFail();

        $scores = app(FormScoreService::class)->calculate($submission->form_data);

        $submission->update([
            'section_scores' => $scores,
            'total_score'    => array_sum($scores),
            'status'         => 'completed',
            'resume_token'   => null, // invalidate token after completion
        ]);

        // Generate PDF
        $pdfPath = app(FormPdfService::class)->generate($submission);

        // Send emails
        Mail::to(auth()->user()->email)->send(new CompletionMail($submission));
        // Mail::to('info@neurofitconnections.com')->send(new CompletionMail($submission));

        return view('form.completed');
    }
}
