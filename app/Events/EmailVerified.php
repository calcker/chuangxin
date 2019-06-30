<?php

namespace App\Events;

use App\Models\Auth\EmailRegister;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;

class EmailVerified
{
    use Dispatchable, SerializesModels;

    public $request;
    
    public $register;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, EmailRegister $register)
    {     
        $this->request = $request;
        
        $this->register = $register;   
    }

}
