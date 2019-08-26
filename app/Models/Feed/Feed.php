<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    const UPDATED_AT = null;
    
    protected $fillable = [
    	'user_id',
    	'type',
    	'copy_id',
    ];

    public function users()
    {

    	return $this->belongsToMany(User::class);

    }


}
