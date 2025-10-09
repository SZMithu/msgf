<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\FormSetting;

class FirstForm extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $email;
    public $lead;
    public $phoneburner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$email,$lead,$phoneburner)
    {
        $this->id = $id;
        $this->email = $email;
        $this->lead = $lead;
        $this->phoneburner = $phoneburner;

    }
    // New Lead - Good Lead - junior33.silva9@gmail.co

    public function build()
    {
        $form = FormSetting::where('setting', 'General')->first();
        $emails = $this->email;
        $lead = $this->lead;
        $burnerId=$this->phoneburner;

        if ($form && !empty($form->cc_email)) {
            $emailArray = explode(',', $form->cc_email);
            
            return $this->subject('New Lead - '. $lead .'-' . $emails)
                        ->view('emails.first-form',['phoneburner' => $burnerId])
                        ->cc($emailArray);
        } else {
            // Handle case where cc_email is empty or null
            return $this->subject('New Lead')
                        ->view('emails.first-form', ['phoneburner' => $burnerId]);
        }
    }
    
}


