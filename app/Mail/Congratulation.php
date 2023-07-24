<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SkiResort;

class Congratulation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $skiResort;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SkiResort $skiResort)
    {
        //
        $this->skiResort = $skiResort;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@skiresort.com')
                    ->subject('¡Felicidades!')
                    ->view('emails.congrats');
    }
}
