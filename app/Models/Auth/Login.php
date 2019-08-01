<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'client_type',
        'account_type',
        'logined_at',
        'logined_ip',
    ];

    public function user()
	{

		return $this->belongsTo(User::class);

	}

}
