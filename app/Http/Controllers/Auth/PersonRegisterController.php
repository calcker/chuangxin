<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use App\Models\User\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonRegisterController extends Controller
{

    public function showPage()
    {
        return view('auth.register.person');
    }

    public function process(Request $request)
    {   
        $data = $request->all();

        $this->validator($data)->validate();

        $user = User::create([
            'name'       => $data['name'],
            'type'       => 'person',
            'login_type' => 'email',
            'domain'     => str_random(64),
        ]);

        $email = Email::create([
            'user_id'    => $user->id,
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'token'      => str_random(64),
        ]);

        event(new Registered($user));

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:emails'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
