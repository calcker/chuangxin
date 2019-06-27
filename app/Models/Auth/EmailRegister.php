<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use App\Models\Auth\Register;
use App\Mail\PersonEmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EmailRegister extends Register implements MustVerifyEmail
{
    
	protected $fillable = ['email', 'password', 'name', 'identity', 'token', 'reg_at', 'reg_ip'];

	protected $hidden = ['email', 'password', 'token',];

    public function hasVerifiedEmail()
    {
        return $this->verified;
    }

    public function markEmailAsVerified()
    {
        $this->verified = 1;
        $this->save();

        //$this->updated_at = Carbon::now();
        //$this->user->email_binding = 1;
        //$this->save();

    }

    public function sendEmailVerificationNotification()
    {
        $mail = (new PersonEmailVerification($this->name, $this->token))
                ->onQueue('emails');

        Mail::to($this->email)->queue($mail);

    }
    
}
