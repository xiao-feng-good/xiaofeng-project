<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    //
    public function list(Request $request)
    {
        $admin = Admin::query()->paginate($request->get('per_page',20));
        return response()->json($admin);
    }

    /**
     * Notes: 后台管理员注册
     * User: xiaofeng
     * DateTime: 2023/5/25 14:37
     * @param AdminRegisterRequest $request
     */
    public function register(AdminRegisterRequest $request)
    {
        $data = $request->validated();
        $member = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password'])
        ];
        $admin = Admin::query()->create($member);
        return response()->json($admin);
    }

    public function login(AdminLoginRequest $request)
    {
        $admin = Admin::query()->where('phone', $request->phone)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw new AuthenticationException('账号不存在或者密码错误');
        }

        if (!$admin->is_open) {
            throw new AuthenticationException('改账号已被禁用,请联系管理员');
        }

        $token = $admin->createToken('Admin', ['*'], now()->addDays(3))->plainTextToken;
        return response()->json($token);
    }
}
