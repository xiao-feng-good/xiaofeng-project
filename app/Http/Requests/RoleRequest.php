<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match ($this->method()) {
            'POST' => [
                'name' => 'required|max:20|unique:roles'
            ],
            'PUT' => [
                'name' => 'required|max:20|unique:roles'
            ]
        };
    }
}
