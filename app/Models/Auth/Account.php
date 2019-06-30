<?php

namespace App\Models\Auth;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

abstract class Account extends Model
{
    
	public $timestamps = false;

    //
	public function user()
	{

		return $this->belongsTo(User::class);

	}
}
