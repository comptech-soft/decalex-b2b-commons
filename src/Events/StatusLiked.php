<?php

namespace B2B\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusLiked implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user = NULL;

    public $message = NULL;

    public function __construct($user, $message) {
        
        $this->user = $user;
        $this->message = $message;

    }

    public function broadcastAs() {
        return  'status-liked';
    }

    public function broadcastOn() {
        return new PrivateChannel('status-liked');
    }
}
