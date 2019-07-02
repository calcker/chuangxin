<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\EmailRegister;
use App\Events\EmailVerified;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function verify(Request $request)
    {
        
        $token = $request->route('token');

        if($this->validator(['token' => $token])->fails())
        {
            return response()->json(['status' => false]);
        }

        $register = EmailRegister::where('token', $token)->first();

        if(!is_object($register))
        {
            return response()->json(['status' => false]);
        }

        if($register->hasVerifiedEmail())
        {
            return response()->json(['status' => false]);
        }
        
        event(new EmailVerified($request, $register));

        return response()->json(['status' => true]);

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
