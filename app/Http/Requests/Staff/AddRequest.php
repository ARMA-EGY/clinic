<?php

namespace App\Http\Requests\Staff;

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
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'User Name is required.',
            'name.unique' => 'This User is Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'User Name',
        ];
    }
}
