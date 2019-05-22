<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   

    use Notifiable;

    const UPDATED_AT = null;

    protected $email;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identity', 'login_type', 'domain',
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
        return ! is_null($this->email_verified_at);
    }

    public function sendEmailVerificationNotification()
    {

        
        
    }

    /**
     * 获取此用户注册模型
     */
    public function getLoginModel()
    {
        return $this->morphTo();
    }

}
