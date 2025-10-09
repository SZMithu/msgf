<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $applicationLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $applicationLink)
    {
        $this->name = $name;
        $this->applicationLink = $applicationLink;
    }


    public function build()
    {
        return $this->subject('Congratulations on Your Eligible Business Funding')
                    ->view('emails.form'); // Use 'emails.test' as your email blade template
    }
}


