<?php

namespace App\Http\Requests\Permissions;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:roles',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'role Name is required.',
            'name.unique' => 'This role Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'role Name',
        ];
    }
}
