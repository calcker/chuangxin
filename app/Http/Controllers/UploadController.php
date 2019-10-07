<?php

namespace App\Http\Controllers;


use App\DataObject\Upload\Qiniu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //获取上传头像数据
    public function avatar(Request $request)
    {

        $config = config('qiniu.avatar');

        $qiniu = new Qiniu($config);
    	
        return response()->json([
            'code' => 201,
            'msg'  => 'Success',
            'data' => [
                'token' => $qiniu->getUploadToken(),
                'uploadURL' => $qiniu->getUploadURL(),
                'downloadURL' => $qiniu->getDownloadURL(),
            ],
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


}
