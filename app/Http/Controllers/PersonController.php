<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    //获取统计数据
    public function counts(Request $request)
    {

    	$counts = auth()->user()->counts();

        return response()->json([
            'code' => 201,
            'msg' => 'Success',
            'data' => $counts,
        ]);

    }

    //获取信息
    public function info(Request $request)
    {
        $info = auth()->user()->info();

        return response()->json([
            'code' => 201,
            'msg' => 'Success',
            'data' => $info,
        ]);

    }

    //修改名字
    public function name(Request $request)
    {
        $data = $request->input();

        $messages = [
            'name.required' => '请输入姓名',
            'name.min' => '姓名不能少于2个字符',
            'name.max' => '姓名不能超过40个字符',
        ];

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'min:2', 'max:40'],
        ], $messages);

        if($validator->fails()) {
            
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => $validator->errors(),
                'data' => null
            ], 422));

        }
        
        $user = auth()->user();

        $user->name($data['name']);

        return response()->json([
            'code' => 201,
            'msg' => '修改成功',
            'data' => $data,
        ]);
        
        //每年修改姓名时间

    }

    //修改性别
    public function gender(Request $request)
    {
        $data = $request->input();

        $messages = [
            'gender.required' => '请选择性别',
            'gender.in' => '性别不在范围内',
        ];

        $validator = Validator::make($data, [
            'gender' => ['required', Rule::in(['male', 'female'])],
        ], $messages);

        if($validator->fails()) {
            
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'msg'  => $validator->errors(),
                'data' => null
            ], 422));

        }
        
        $user = auth()->user();

        $person = $user->person;

        $person->gender = $data['gender'];

        $person->save();

        return response()->json([
            'code' => 201,
            'msg' => '修改成功',
            'data' => $data,
        ]);

    }


    public function __construct()
    {
        $this->middleware('auth');
    }


}
