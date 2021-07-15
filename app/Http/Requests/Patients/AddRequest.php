<?php

namespace App\Http\Requests\Patients;

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
            'name' => 'required',
            'phone' => 'required',
            'identifiation' => 'required',
            'dateofbirth' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Patient Name is required.',
            'name.unique' => 'This Patient Name is Already Exist.',
            'phone.unique' => 'This Phone Number is Already Exist.',
            'phone.required' => 'Phone is required.',
            'identifiation.required' => 'Identifiation is required.',
            'dateofbirth.required' => 'Date of Birth is required.',
            'age.required' => 'Age is required.',
            'gender.required' => 'Gender is required.',
            'nationality.required' => 'Nationality is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Patient Name',
        ];
    }
}
