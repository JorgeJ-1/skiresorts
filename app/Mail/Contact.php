<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $messag;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messag)
    {
        //
        $this->messag = $messag;
        
        //dd($this->message);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->messag->email)
                    ->subject('Mensaje recibido: '.$this->messag->subject)
                    ->with('center', 'CIFO Sabadell') 
                    ->view('emails.contact');
    }
}
