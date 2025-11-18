<?php

namespace App\Mail;

use App\Models\FormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompletionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;
    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct(FormSubmission $submission)
    {
        $this->submission = $submission;
        $this->pdfPath = storage_path("app/{$submission->pdf_path}");
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your NeuroFit Form Submission is Complete',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.completion',
            with: [
                'submission' => $this->submission,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $path = public_path($this->submission->pdf_path);

        if (file_exists($path)) {
            return [
                Attachment::fromPath($path)
                    ->as('NeuroFit_Form.pdf')
                    ->withMime('application/pdf'),
            ];
        }

        return [];
    }
}
