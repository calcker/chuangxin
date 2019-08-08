<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    const UPDATED_AT = null;
    
    protected $fillable = [
    	'user_id',
    	'follower_id',
    ];
}
