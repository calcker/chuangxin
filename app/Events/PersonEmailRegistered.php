<?php

namespace App\Events;

use App\Models\Auth\User;
use App\Models\Auth\EmailAccount;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PersonEmailRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $emailAccount;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, EmailAccount $emailAccount)
    {
        $this->user = $user;

        $this->emailAccount = $emailAccount;
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
