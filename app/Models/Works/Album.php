<?php

namespace App\Models\Works;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
    	'key',
    	'user_id',
    	'name',
    	'is_default',
    ];

    public function user()
	{

		return $this->belongsTo(User::class);

	}

}
