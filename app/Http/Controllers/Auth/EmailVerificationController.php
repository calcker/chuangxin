<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\EmailRegister;
use App\Events\EmailVerified;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
    protected $redirectTo = '/';
    
    public function verify(Request $request)
    {
        
        $token = $request->route('token');

        if($this->validator(['token' => $token])->fails()) return redirect($this->redirectPath());
        
        $register = EmailRegister::where('token', $token)->first();

        if(!$register) return redirect($this->redirectPath());

        if($register->hasVerifiedEmail()) return redirect($this->redirectPath());
        
        event(new EmailVerified($request, $register));

        //return redirect('/router#/register/email/verified');

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

    protected function validator(array $data){

        $messages = [
            'required' => 'token错误',
            'size' => 'token错误',
        ];

        return Validator::make($data, [
            'token' => ['required', 'string', 'size:64'],
        ], $messages);
        
    }
}
