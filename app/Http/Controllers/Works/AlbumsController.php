<?php

namespace App\Http\Controllers\Works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    //
    public function my(Request $request)
    {
    	$albums = auth()->user()->albums()->get();

    	return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' => $albums,
        ]);



    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    

}
