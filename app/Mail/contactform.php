<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactform extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;


    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    
  
    public function build()
    {
        return $this->subject('Nouveau message de contact')
                    ->view('emails.formemail')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'message' => $this->message,
                    ]);
    }
}
