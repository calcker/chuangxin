<?php

namespace App\Listeners;

use App\Events\PersonRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationNotification implements ShouldQueue
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
    public function handle(PersonRegistered $event)
    {
        die(var_dump($event->user->email_verified_at));
        
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {

            $event->user->sendEmailVerificationNotification();
        }
    }
}
