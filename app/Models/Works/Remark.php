<?php

namespace App\Models\Works;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    //
    protected $table = 'works_remarks';

    protected $fillable = [
    	'key',
    	'works_key',
    	'notice_key',
    	'from_user_id',
    	'to_user_id',
    	'content',
    ];

    public function works()
    {

    	return $this->belongsTo(Works::class);

    }


}
