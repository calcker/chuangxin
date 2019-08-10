<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountsController extends Controller
{
    //
    public function my(Request $request)
    {

        $counts = auth()->user()->counts();

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' => $counts,
        ]);
        
    }

    public function someone(Request $request)
    {



    }

}
