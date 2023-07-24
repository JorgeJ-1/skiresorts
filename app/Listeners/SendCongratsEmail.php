<?php

namespace App\Listeners;

use App\Events\FirstSkiResortCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\Congratulation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class SendCongratsEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FirstSkiResortCreated  $event
     * @return void
     */
    public function handle(FirstSkiResortCreated $event)
    {
        //
        Mail::to($event->user->email)->send(new Congratulation($event->skiResort));
    }
}
