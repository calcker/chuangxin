<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
    
    public function create(Request $request)
    {

    	die('aa');
    	return response()->json([
            'code' => 201,
            'msg'  => 'Success!',
            'data' => [
                'src' => captcha_src('flat'),
            ],
        ], 201);

    }


    public function verify()
    {

    	

    }


}
