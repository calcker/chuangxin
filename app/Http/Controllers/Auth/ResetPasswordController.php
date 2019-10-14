<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    
    public function reset(Request $request)
    {
        $data = $request->input();

        //die(var_dump($data));

        $validator = $this->validator($data);

        if($validator->fails()) {

            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => $validator->errors(),
                'data' => null,
            ], 422));

        }

        $user = auth()->user();

        if($user->password != Hash::make($data['password'])) {

            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => 'Failure',
                'data' => [
                    'password.old' =>['原密码错误'],
                ],
            ], 422));

        }




        /*
        $request->validate($this->rules(), $this->validationErrorMessages());

        $data = $request->input();

        die(var_dump($data));

        $request->validate($this->rules(), $this->validationErrorMessages());
        */
    }


     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        $messages = [
            'password.old.required' => '请输入原密码',
            'password.old.min' => '原密码不能少于6个字符',
            'password.old.max' => '原密码不能超过255个字符',
            'password.new.required' => '请输入新密码',
            'password.new.min' => '新密码不能少于6个字符',
            'password.new.max' => '新密码不能超过255个字符',
            //'password.new.confirmed' => '两次输入的新密码不相同',
            'password.repeat.required' => '请重复输入密码',
            'password.repeat.same' => '两次输入的新密码不相同',
            'captcha.required' => '请输入验证码',
            'captcha.captcha' => '验证码错误',
        ];

        return Validator::make($data, [
            'password.old' => ['required', 'string', 'min:6', 'max:255'],
            'password.new' => ['required', 'string', 'min:6', 'max:255'],
            //'password.new' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
            'password.repeat' => ['required', 'string', 'same:password.new'],
            'captcha' => ['required', 'captcha'],
        ], $messages);

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
}
