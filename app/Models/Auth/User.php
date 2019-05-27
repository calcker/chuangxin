<?php

namespace App\Models\Auth;

use App\Mail\PersonEmailVerification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable extends MustVerifyEmail
{   

    use Notifiable;

    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identity', 'email', 'login_type', 'domain',  'email_verified_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function hasVerifiedEmail()
    {
        return true;
    }
    

    public function sendEmailVerificationNotification()
    {

        $mail = (new PersonEmailVerification($order))
                ->onQueue('emails');

        Mail::to($this->email)
            ->queue($mail);
        
    }

}
