<?php

namespace App\Providers;

use App\Events\EmailRegistered;
use App\Events\EmailVerified;
use App\Listeners\SendEmailVerificationNotification;
use App\Listeners\MarkEmailAsVerified;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        EmailRegistered::class => [
            SendEmailVerificationNotification::class,
        ], 
        EmailVerified::class => [
            MarkEmailAsVerified::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
