<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use App\Models\Auth\User;
use App\Models\Auth\Register;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class EmailRegister extends Register implements MustVerifyEmail
{
    
	protected $fillable = ['email', 'password', 'name', 'identity', 'token', 'reg_at', 'reg_ip'];

	protected $hidden = ['email', 'password', 'token'];

    public function hasVerifiedEmail()
    {
        return $this->verified;
    }

    public function markEmailAsVerified()
    {
        $this->verified = 1;
        $this->save();
    }

    public function sendEmailVerificationNotification()
    {
        $mail = (new EmailVerification($this->name, $this->token))
                ->onQueue('emails');

        Mail::to($this->email)->queue($mail);

    }

    public function createAccount(Request $request)
    {

        $user = User::create([
            'key'        => str_random(64),
            'name'       => $this->name,
            'identity'   => $this->identity,
            'email'      => $this->email,
            'password'   => $this->password,
            'domain'     => str_random(64),
            'reg_type'   => 'email',
            'created_ip' => $request->getClientIp(),
            'email_binding' => 1,
        ]);

        /*
        $emailAccount = EmailAccount::create([
            'user_id'     => $user->id,
            'email'       => $this->email,
            'password'    => $this->password,
            'verified_at' => Carbon::now(),
            'verified_ip' => $request->getClientIp(),
        ]);
        */

    }
    
}
