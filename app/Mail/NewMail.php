<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $contact;

    public function __construct(Contact $contact)
    {
       $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.welcome')
                    ->subject("My new BEST...");
    }
}
