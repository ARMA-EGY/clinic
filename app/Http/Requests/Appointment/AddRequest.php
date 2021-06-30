<?php

namespace App\Http\Requests\Sectors;

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
            'name' => 'required|unique:sector',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Sector Name is required.',
            'name.unique' => 'This Sector is Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Sector Name',
        ];
    }
}
