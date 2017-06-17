<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emails extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject,$message,$email)
    {

        $data=array(
            'name'=> $name,
            'subject'=> $subject,
            'message'=> $message,
            'email'=> $email
        );

        $this->msg=join(" ### ",$data);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bsal.gautam21@gmail.com')
        ->view('emails.emailTemplate');
    }
}
