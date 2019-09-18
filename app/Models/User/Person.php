<?php

namespace App\Models\User;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
	
	protected $table = 'persons';

	protected $primaryKey = 'user_id';

	protected $fillable = ['user_id'];

	public function user()
	{

		return $this->belongsTo(User::class);

	}

}
