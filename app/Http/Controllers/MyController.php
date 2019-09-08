<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    //

    public function counts(Request $request)
    {

    	$counts = auth()->user()->counts();

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' => $counts,
        ]);


    }

    public function baseInfo(Request $request)
    {
        $baseInfo = auth()->user()->baseInfo();

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' => $baseInfo,
        ]);

    }


    public function __construct()
    {
        $this->middleware('auth');
    }


}
