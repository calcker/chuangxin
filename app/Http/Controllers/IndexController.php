<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    //
    public function indexPage()
    {

    	return view('index/index');

    }

    public function aboutPage()
    {

    	return view('index/about');

    }

    public function helpPage()
    {

    	return view('index/help');

    }

}
