<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use App\Models\Auth\Account;
use App\Mail\PersonEmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class EmailAccount extends Account
{
    
	protected $fillable = ['user_id', 'email', 'password', 'token',];

	protected $hidden = ['email', 'password', 'token',];

    public function hasVerifiedEmail()
    {
        return ! is_null($this->updated_time);
    }

    public function markEmailAsVerified()
    {
        $this->updated_at = Carbon::now();
        $this->user->email_binding = 1;
        $this->save();
    }

    public function sendEmailVerificationNotification()
    {
        $mail = (new PersonEmailVerification($this->user->name, $this->token))
                ->onQueue('emails');

        Mail::to($this->email)
            ->queue($mail);
    }



}
