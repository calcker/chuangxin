<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    
	const UPDATED_AT = null;
    
	protected $fillable = [
		'user_id', 'email', 'password', 'token',
	];

	protected $hidden = [
		'password', 'token',
	];

    /**
	 * 获取Email对应用户
     */
    public function user()
    {
    	return $this->morphOne('App\Models\User\User', 'loginable');
    }

}
