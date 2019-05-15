<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   

    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'login_type', 'domain',
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
    //protected $casts = [
    //    'email_verified_at' => 'datetime',
    //];

    /**
     * 获取此用户注册模型
     */
    public function loginable()
    {
        return $this->morphTo();
    }

}
