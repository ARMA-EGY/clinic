<?php

namespace App\Http\Requests\Doctors;

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
            'name' => 'required|unique:users,name,'.$this->doctor->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Doctor Name is required.',
            'name.unique' => 'This Doctor is Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Doctor Name',
        ];
    }
}
