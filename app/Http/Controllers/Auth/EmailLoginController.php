<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class EmailLoginController extends LoginController
{

    protected function validateLogin(Request $request)
    {	

        if($this->validator($request->input())->fails()) {
            
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => $validator->errors(),
                'data' => null
            ], 422));

        }

    }

    /*
    protected function attemptLogin(Request $request)
    {

    	$emailAccount = EmailAccount::where('email', $this->getInputEmail($request))->first();

    	if(!is_object($emailAccount)) return false;

    	if(!Hash::check($this->getInputPassword($request), $emailAccount->password)) return false;

		Auth::login($emailAccount->user);

    	return true;
    }
    */

    protected function validator(array $data)
    {
         $messages = [
            'email.required' => '请输入email',
            'email.email' => 'email格式不正确',
            'password.required' => '请输入密码',
        ];

        return Validator::make($data, [
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ], $messages);

    }



}
