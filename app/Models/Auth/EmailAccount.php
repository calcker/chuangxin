<?php

namespace App\Models\Auth;

use Illuminate\Support\Facades\Mail;
use App\Models\Auth\Account;
use App\Mail\PersonEmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class EmailAccount extends Account implements MustVerifyEmail
{
    
	protected $fillable = ['user_id', 'email', 'password', 'token',];

	protected $hidden = ['email', 'password', 'token',];

    public function hasVerifiedEmail()
    {
        return ! is_null($this->updated_time);
    }

    public function sendEmailVerificationNotification()
    {

        $mail = (new PersonEmailVerification($this->user->name, $this->token))
                ->onQueue('emails');

        Mail::to($this->email)
            ->queue($mail);
    }

    public function markEmailAsVerified()
    {
    	


    }



}
