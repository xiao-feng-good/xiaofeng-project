<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function rules()
    {
        return match ($this->method()) {
            'POST' => [
                'phone' => 'bail|required|phone:CN,mobile',
                'password' => 'required|alpha_dash|min:6'
            ]
        };
    }

    public function attributes()
    {
        return [
            'phone' => '手机号',
            'password' => '密码'
        ];
    }
}
