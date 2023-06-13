<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
                'name' => 'required|string|max:100|unique:permissions'
            ],
            'PUT' => [
                'name' => 'required|string|max:100|unique:permissions'
            ]
        };
    }
}
