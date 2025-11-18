<?php

namespace App\Services;

use App\Models\FormSubmission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\info;

class FormPdfService
{
    /**
     * Generate PDF for a completed form and store it in storage/app/forms/
     *
     * @param  FormSubmission  $submission
     * @return string  PDF path
     */
    public function generate(FormSubmission $submission): string
    {
        // Data to send to the Blade PDF view
        $data = [
            'form' => $submission->form_data,
            'scores' => $submission->section_scores,
            'user' => $submission->user,
            'form_type' => $submission->form_type,
            'form_name' => $submission->form_name,
            'submitted_at' => $submission->updated_at,
        ];

        // Render PDF from Blade
        $pdf = Pdf::loadView('pdf.intake', $data);

        // Folder (single global folder)
        $dir = public_path("forms");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        // File name (unique by submission ID)
        $fileName = "submission_{$submission->id}.pdf";

        // Paths
        $relative = "forms/{$fileName}";
        $full = public_path($relative);

        // Save PDF
        try {
            file_put_contents($full, $pdf->output());
        } catch (\Throwable $e) {
            Log::error("PDF save error for {$submission->id}: " . $e->getMessage());
            throw $e;
        }

        // Save DB path (relative)
        $submission->update(['pdf_path' => $relative]);

        return $relative;
    }
}
