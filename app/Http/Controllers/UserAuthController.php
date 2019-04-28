<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
	public function signUpPage(){
        $binding = [
            'title' => trans('shop.auth.sign-up'),
        ];
        return view('auth.signUp', $binding);
    }
    
}
