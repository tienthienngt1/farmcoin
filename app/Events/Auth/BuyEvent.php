<?php

namespace App\Events\Auth;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class BuyEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $cost;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $cost, $request)
    {
       $this->user = $user;
       $this->cost = $cost;
       $this->request = $request;
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
