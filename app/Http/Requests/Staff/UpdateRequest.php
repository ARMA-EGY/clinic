<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:users,name,'.$this->staff->id,
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
