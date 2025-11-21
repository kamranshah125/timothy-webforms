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

    public function thankyouPage($token)
    {


        // dd($token);
        $submission =  FormSubmission::where('resume_token', $token)->first();
           

        if (!$submission) {
            abort(404, 'Submission not found.');
        }

        if ($submission->status !== 'completed') {
            return redirect()->route('form.start', ['token' => $submission->resume_token]);
        }

        return view('forms.thank-you', compact('submission'));
    }
}
