<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\SkiResort;
use App\Models\User;

class FirstSkiResortCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $skiResort, $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SkiResort $skiResort, User $user)
    {
        //
        $this->skiResort=$skiResort;
        $this->user=$user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
