<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Login;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Carbon\Carbon;


class EmailLoginController extends LoginController
{

    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    protected function sendLoginResponse(Request $request)
    {

        //$request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = $this->guard()->user();

        $this->saveLoginRecord($user, $request);

        return response()->json([
            'code' => 201,
            'message'  => 'Success',
            'data' => [
                'id'    => $user['id'],
                'key'   => $user['key'],
                'name'  => $user['name'],
                'api_token' => $user['api_token'],
                'remember_token' => $request->filled('remember') ? $user['remember_token'] : '',
            ],
        ], 201);

    }

    protected function saveLoginRecord(User $user, Request $request)
    {
        $login = Login::create([
            'user_id'  => $user->id,
            'client_type' => 'web',
            'account_type' => 'email',
            'logined_at' => Carbon::now(),
            'logined_ip' => $request->getClientIp(),
        ]);
    } 


    protected function validateLogin(Request $request)
    {	

        if ($this->validator($request->input())->fails()) {
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'message' => 'Failure',
                'errors'  => $this->validator($request->input())->errors(),
            ], 422));
        }

        /*
        if($this->validator($request->input())->fails()) {
            
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => $this->validator($request->input())->errors(),
                'data' => null
            ], 422));

        }
        */

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
