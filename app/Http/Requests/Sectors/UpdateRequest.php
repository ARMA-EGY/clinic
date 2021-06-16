<?php

namespace App\Http\Requests\Sectors;

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
            'name' => 'required|unique:sector,name,'.$this->sector->id,
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
