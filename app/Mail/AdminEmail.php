<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use App\Models\FormSetting;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;
    public $id;
    public $email;
    public $phoneburner;

    public function __construct($filePath,$id,$email,$phoneburner)
    {
        $this->filePath = $filePath;
        $this->id = $id;
        $this->email = $email;
        $this->phoneburner = $phoneburner;
    }

    public function build()
    {
        $form = FormSetting::where('setting', 'General')->first();
        $emails=$this->email;
        $burnerId=$this->phoneburner;
        if ($form && !empty($form->cc_email)) {
            $emailArray = explode(',', $form->cc_email);
    
            return $this->subject('Full Lead - ' .$emails)
                        ->cc($emailArray)
                        ->view('emails.admin', ['phoneburner' => $burnerId])
                        ->attach($this->filePath, [
                            'as' => 'attachment_name.pdf',
                            'mime' => 'application/pdf',
                        ]);
        } else {
            // Handle case where $form is null or cc_email is empty
            return $this->subject('Full Lead')
                        ->view('emails.admin', ['phoneburner' => $burnerId])
                        ->attach($this->filePath, [
                            'as' => 'attachment_name.pdf',
                            'mime' => 'application/pdf',
                        ]);
        }
    }
    
}



