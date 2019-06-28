<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Models\Auth\EmailRegister;
use App\Http\Controllers\Auth\RegisterController;
use App\Events\EmailRegistered;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmailRegisterController extends RegisterController
{
    
    public function register(Request $request)
    {   
        $data = $request->all();

        $this->validator($data)->validate();

        $register = EmailRegister::create([
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'name'       => $data['name'],
            'identity'   => $data['identity'],
            'token'      => str_random(64),
            'reg_at'     => Carbon::now(),
            'reg_ip'     => $request->getClientIp(),
        ]);

        event(new EmailRegistered($register));
        
        /*
        $user = User::create([
            'key'        => str_random(64),
            'name'       => $data['name'],
            'identity'   => 'person',
            'domain'     => str_random(64),
            'reg_type'   => 'email',
            'created_ip' => $request->getClientIp(),
        ]);

        $emailAccount = EmailAccount::create([
            'user_id'    => $user->id,
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'token'      => str_random(64),
        ]);

        event(new PersonEmailRegistered($user, $emailAccount));
        */
        

        //event(new Registered($user = $this->create($request->all())));

        


        /*
        //$input = request()->all();

        //var_dump($input);

        //exit;

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
        */

    }

    public function pending(Request $request)
    {

        $user = Auth::user();

        //$user = $request->user();

        die(var_dump($user));

        if(! $user) {
            return redirect($this->redirectPath());
        }

        if($user->hasBindingEmail()) {
            return redirect($this->redirectPath());
        }

        $url = 1;

        return view('auth.register.pending');

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
            'name.required' => '请填写姓名',
            'name.min' => '姓名不能少于2个字符',
            'name.max' => '姓名不能超过255个字符',
            'email.required' => '请填写email',
            'email.email' => 'email格式不正确',
            'email.min' => 'email不能少于5个字符',
            'email.max' => 'email不能超过255个字符',
            'email.unique' => '此email已注册',
            'password.required' => '请填写密码',
            'password.min' => '密码不能少于6个字符',
            'password.max' => '密码不能超过255个字符',
            'identity.required' => '缺少账户类型',
            'identity.in'  => '账号类型不在范围内',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:255', 'unique:email_accounts'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'identity' => ['required', Rule::in(['person', 'company', 'org'])],
        ], $messages);
    }
    
}
