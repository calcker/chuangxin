<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class EmailLoginController extends LoginController
{

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }	

}
