<?php

namespace App\Models\Auth;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


abstract class Register extends Model
{
    
	public $timestamps = false;

	abstract public function createAccount(Request $request);

}
