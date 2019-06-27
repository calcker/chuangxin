<?php

namespace App\Listeners;

use App\Events\PersonEmailRegistered;
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
    public function handle(PersonEmailRegistered $event)
    {
       $register = $event->register;

        if ($register instanceof MustVerifyEmail && ! $register->hasVerifiedEmail()){

            $register->sendEmailVerificationNotification();
        
        }
    }
}
