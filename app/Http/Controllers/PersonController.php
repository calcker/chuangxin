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
            'gender' => ['required', Rule::in([1, 2])],
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

    //修改职业
    public function profession(Request $request)
    {
        $data = $request->input();

        $messages = [
            'profession.required' => '请输入职业',
            'profession.max' => '不能超过200个字符',
        ];

        $validator = Validator::make($data, [
            'profession' => ['required', 'string', 'max:200'],
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

        $person->profession = $data['profession'];

        $person->save();

        return response()->json([
            'code' => 201,
            'msg' => '修改成功',
            'data' => $data,
        ]);

    }

    //增加创新领域
    public function addField(Request $request)
    {
        $data = $request->input();

        $messages = [
            'field.required' => '请选择创新领域',
        ];

        $validator = Validator::make($data, [
            'profession' => ['required', 'number'],
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

        $person->profession = $data['profession'];

        $person->save();

        return response()->json([
            'code' => 201,
            'msg' => '修改成功',
            'data' => $data,
        ]);

    }

    //修改生日
    public function birthday(Request $request)
    {
        $data = $request->input();

        $messages = [
            'birthday.required' => '请选择出生日期',
            'birthday.date' => '日期格式错误',
        ];

        $validator = Validator::make($data, [
            'birthday' => ['required', 'date'],
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

        $person->birthday = $data['birthday'];

        $person->save();

        return response()->json([
            'code' => 201,
            'msg' => '修改成功',
            'data' => $data,
        ]);

    }

    //修改地区
    public function district(Request $request)
    {
        $data = $request->input();

        $messages = [
            'province.required' => '请选择省份',
            'province.min' => '请选择省份',
            'province.max' => '请选择省份',
            'city.required' => '请选择城市',
            'city.min' => '请选择城市',
            'city.max' => '请选择城市',
            'area.required' => '请选择区县',
            'area.min' => '请选择区县',
            'area.max' => '请选择区县',
        ];

        $validator = Validator::make($data, [
            'province' => ['required', 'string', 'min:2', 'max:50'],
            'city' => ['required', 'string', 'min:2', 'max:50'],
            'area' => ['required', 'string', 'min:2', 'max:50'],
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

        $person->district = json_encode($data['district'], JSON_UNESCAPED_UNICODE);

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
