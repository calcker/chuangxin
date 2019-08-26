<?php

namespace App\Models\Auth;

use App\Models\Works\Album;
use App\Models\User\Person;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmailRegister extends Register implements MustVerifyEmail
{
    
	protected $fillable = ['email', 'password', 'name', 'identity', 'token', 'created_ip'];

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
            'key'        => str_random(24),
            'name'       => $this->name,
            'identity'   => $this->identity,
            'email'      => $this->email,
            'password'   => $this->password,
            'domain'     => str_random(64),
            'reg_type'   => 'email',
            'created_ip' => $request->getClientIp(),
            'remember_token' => str_random(64),
            'api_token'  => str_random(64),
        ]);

        //作品默认专辑
        $album = Album::create([
            'key' => str_random(24),
            'user_id' => $user->id,
            'name' => '默认专辑',
            'is_default' => true,
        ]);

        switch ($this->identity) {
            case 'person':
                $person = Person::create([
                    'user_id' => $user->id,
                ]);

                return true;
            
            default:
                # code...
                break;
        }

    }
    
}
