<?php

namespace App\Models\Works;

use App\Models\Auth\User
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    //
	const UPDATED_AT = null;

    protected $fillable = [
    	'key',
    	'user_id',
    	'copy_key',
    	'feed_key',
    	'album_key',
    	'title',
    	'brief',
    	'content',
    ];

    public function user()
	{

		return $this->belongsTo(User::class);

	}
}
