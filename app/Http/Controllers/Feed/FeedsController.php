<?php

namespace App\Http\Controllers\Feed;

use App\Models\Content\Feed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedsController extends Controller
{

    private static $max_feed_id;

    private static $min_feed_id;


    //更新关注动态
    public function update(Request $request)
    {

        $array = auth()->user()->updateFollowingsFeeds(self::$max_feed_id)->get();

        if(count($array) > 0) {

            reset($array);

            $first = current($array);

            self::$max_feed_id = $first['id'];

        }

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' =>  $array,
        ]);
        
    }

    //回溯关注动态
    public function backward(Request $request)
    {

        $array = auth()->user()->backwardFollowingsFeeds(self::$min_feed_id)->get();

        if(count($array) > 0) {
       
            reset($array);

            $last = end($array);

            self::$min_feed_id = $last['id'];

        }

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' =>  $array,
        ]);

    }


    //我的动态
    public function my(Request $request)
    {

    	$data = auth()->user()->feeds()->get();

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' =>  $data,
        ]);

    }

    //某人的动态
    public function someone(Request $request)
    {

        $data = auth()->user()->feeds();

        return response()->json([
            'code' => 201,
            'message' => 'Success',
            'data' =>  $data,
        ]);

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
