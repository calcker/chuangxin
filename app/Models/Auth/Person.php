<?php

namespace App\Models\Auth;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
	
	protected $table = 'persons';

	protected $fillable = ['user_id'];

	public function user()
	{

		return $this->belongsTo(User::class);

	}

}
