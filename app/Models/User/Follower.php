<?php

namespace App\Models\User;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    const UPDATED_AT = null;
    
    protected $fillable = [
    	'user_id',
    	'follower_id',
    ];

    public function user()
	{

		return $this->belongsTo(User::class);

	}
}
