<?php

namespace App\Http\Requests\Pledges;

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
            'patient_id' => 'required',
            'file_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'Patient Information is required.',
        ];
    }

    public function attributes()
    {
        return [
            'patient_id' => 'Patient Information',
        ];
    }
}
