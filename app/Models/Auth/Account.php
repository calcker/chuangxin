<?php

namespace App\Models\Auth;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

abstract class Account extends Model
{
    
	const UPDATED_AT = null;

    //
	public function user()
	{

		return $this->belongsTo(User::class);

	}
}
