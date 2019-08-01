<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedsController extends Controller
{
	public function feeds(Request $request)
    {
        $data = Feed::all();

        return response()->json([
            'code' => 201,
            'message'  => 'Success',
            'data' => $data,
        ], 201); 

    }
    
}
