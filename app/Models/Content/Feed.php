<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
    	'user_id',
    	'username',
    	'user_type',
    	'feed_type',
    	'copy_key',
    	'timestamp',
    ];

    public function user()
    {

    	return $this->belongsTo(User::class);

    }


}
