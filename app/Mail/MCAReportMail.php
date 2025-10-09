<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class MCAReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;
    public $body;

    public function __construct($pdfPath, $body = null)
    {
        $this->pdfPath = $pdfPath;
        $this->body = $body ?: 'Please find the attached MCA report.';
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'M C A Report Mail',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.mca_report',
            with: ['body' => $this->body],
        );
    }

    public function attachments()
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('MCA_Report.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
