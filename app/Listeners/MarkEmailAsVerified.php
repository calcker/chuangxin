<?php

namespace App\Listeners;

use App\Events\PersonEmailVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Queue\InteractsWithQueue;

class MarkEmailAsVerified
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
     * @param  PersonRegistered  $event
     * @return void
     */
    public function handle(PersonEmailVerified $event)
    {
        $event->register->markEmailAsVerified();
    }
}
