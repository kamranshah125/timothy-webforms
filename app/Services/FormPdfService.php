<?php

namespace App\Services;

use App\Models\FormSubmission;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;

class FormPdfService
{
    /**
     * Generate PDF for a completed form and store inside /public/forms/
     *
     * @param  FormSubmission  $submission
     * @return string  Relative PDF path
     */
    public function generate(FormSubmission $submission): string
    {
        // ------------ Prepare Data for PDF View ------------
        $data = [
            'form'         => $submission->form_data,
            'scores'       => $submission->section_scores,
            'user'         => $submission->user,
            'form_type'    => $submission->form_type,
            'form_name'    => $submission->form_name,
            'submitted_at' => $submission->updated_at,
        ];

        // ------------ Ensure Folder Exists ------------
        $folder = public_path('forms');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        // ------------ File Name & Path ------------
        $fileName = "submission_{$submission->id}.pdf";
        $relative = "forms/{$fileName}";
        $fullPath = public_path($relative);

        // ------------ Generate & Save PDF ------------
        try {
            Pdf::view('pdf.intake', $data)
                ->format('letter')
                ->margins(12, 12, 14, 12)   // top, right, bottom, left (mm)
                ->save($fullPath);
        } catch (\Throwable $e) {
            Log::error("PDF save error for submission {$submission->id}: " . $e->getMessage());
            throw $e;
        }

        // ------------ Update DB Path ------------
        $submission->update([
            'pdf_path' => $relative,
        ]);

        return $relative;
    }
}
