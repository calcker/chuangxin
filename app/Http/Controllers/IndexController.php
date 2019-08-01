<?php

namespace App\Http\Controllers;


class IndexController extends Controller
{
    //
    public function index()
    {

    	return view('index/index');

    }

    public function about()
    {

    	return view('index/about');

    }

    public function help()
    {

    	return view('index/help');

    }

}
