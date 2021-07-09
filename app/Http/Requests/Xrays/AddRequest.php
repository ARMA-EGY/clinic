<?php

namespace App\Http\Requests\Xrays;

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
            'patient_id' => 'required',
            'appointment_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'Patient Information is required.',
            'appointment_id.required' => 'Appointment  is required.',
        ];
    }

    public function attributes()
    {
        return [
            'patient_id' => 'Patient Information',
            'appointment_id' => 'Appointment ',
        ];
    }
}
