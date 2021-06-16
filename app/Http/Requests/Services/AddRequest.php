<?php

namespace App\Http\Requests\Services;

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
            'name' => 'required|unique:services',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service Name is required.',
            'name.unique' => 'This Service is Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Service Name',
        ];
    }
}
