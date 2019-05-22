<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    
	protected $fillable = [
		'user_id', 'email', 'password', 'active_token',
	];

	protected $hidden = [
		'password', 'active_token',
	];

    /**
	 * 获取Email对应用户
     */
    public function getUserModel()
    {
    	return $this->morphOne('App\Models\User\User', 'getLoginModel');
    }

}
