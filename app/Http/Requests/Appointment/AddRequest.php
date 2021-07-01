<?php

namespace App\Http\Requests\Appointment;

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
            'appointment_date' => 'required',
            'appointment_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'appointment_date.required' => 'Appointment Date is required.',
            'appointment_number.required' => 'Appointment Number is required.',
        ];
    }

    public function attributes()
    {
        return [
            'appointment_date' => 'Appointment Date',
            'appointment_number' => 'Appointment Number',
        ];
    }
}
