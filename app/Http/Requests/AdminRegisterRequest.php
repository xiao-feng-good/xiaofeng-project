<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    public function rules()
    {
        return match ($this->method()) {
            'POST' => [
                'name' => 'required|string|max:20',
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
