<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use App\Models\Auth\Account;
use App\Mail\PersonEmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class EmailAccount extends Account
{
    
	protected $fillable = ['user_id', 'email', 'password', 'verified_at', 'verified_ip'];

	protected $hidden = ['user_id', 'password', 'verified_at', 'verified_ip'];

    public function resetPassword()
    {


    }

}
