<?php

namespace App\Http\Requests\Branches;

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
            'name' => 'required|unique:branches,name,'.$this->branch->id,
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Branch Name is required.',
            'name.unique' => 'This Branch Name is Already Exist.',
            'phone.required' => 'Phone is required.',
            'city.required' => 'City is required.',
            'address.required' => 'Address is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Branch Name',
        ];
    }
}
