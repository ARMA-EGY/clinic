<?php

namespace App\Http\Requests\AppointmentServices;

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
            'service' => 'required',
            'body_part' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'service.required' => 'Service is required.',
            'body_part.required' => 'Body Part is required.',
        ];
    }

    public function attributes()
    {
        return [
            'service' => 'Service',
            'body_part' => 'Body Part',
        ];
    }
}
