<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Models\Auth\EmailAccount;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EmailLoginController extends LoginController
{

    protected function validateLogin(Request $request)
    {

        $request->validate([
            'username' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {

    	$emailAccount = EmailAccount::where('email', $this->getInputEmail($request))->first();

    	if(!is_object($emailAccount)) return false;

    	if(!Hash::check($this->getInputPassword($request), $emailAccount->password)) return false;

		Auth::login($emailAccount->user);

    	return true;
    }

    protected function getInputEmail(Request $request)
    {
        return $request->input('username');
    }

    protected function getInputPassword(Request $request)
    {
    	return $request->input('password');
    }



}
