<?php

namespace App\Events;

use App\Models\Auth\User;
use App\Models\Auth\EmailRegister;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class EmailRegistered
{
    use Dispatchable, SerializesModels;

    public $register;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EmailRegister $register)
    {

        $this->register = $register;

    }

}
