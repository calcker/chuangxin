<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Models\Auth\EmailAccount;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Events\PersonEmailRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonEmailRegisterController extends RegisterController
{

    public function showRegistrationForm()
    {
        return view('auth.register.person');
    }
    

    public function register(Request $request)
    {   
        $data = $request->all();

        $this->validator($data)->validate();

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


    public function active(){

        

        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email_accounts'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }
    
}
