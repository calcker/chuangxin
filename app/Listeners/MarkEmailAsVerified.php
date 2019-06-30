<?php

namespace App\Listeners;

use App\Events\EmailVerified;
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
     * @param  EmailVerified $event
     * @return void
     */
    public function handle(EmailVerified $event)
    {

        $request = $event->request;

        $register = $event->register;

        $register->markEmailAsVerified();

        $register->createAccount($request);

    }
}
