<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\EmailAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Validator;

class EmailVerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use RedirectsUsers;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/route#/profile';
    
    public function verify(Request $request)
    {
        
        $token = $request->route('token');

        if(! $this->isToken($token)) {
            return redirect($this->redirectPath());
        }

        $register = EmailRegister::where('token', $token)->first();

        die(var_dump($register));

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
        ])


        if(! $account) {
            return redirect($this->redirectPath());
        }

        if($account->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if($account->markEmailAsVerified()) {
            event(new Verified($account->user()));
        }

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('signed')->only('verify');
        //$this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    protected function isToken($token, $length = 64){
        
        return preg_match('/^[0-9a-zA-Z]{' . $length . '}$/', $str) ? true : false;
        
    }
}
