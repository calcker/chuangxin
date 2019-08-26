<?php

namespace App\Models\Works;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    //
    protected $table = 'works_praises';

    protected $fillable = [
    	'key',
    	'works_key',
    	'notice_key',
    	'feed_key',
    	'praiser_id',
    ];

    public function works()
    {

    	return $this->belongsTo(Works::class);

    }
}
