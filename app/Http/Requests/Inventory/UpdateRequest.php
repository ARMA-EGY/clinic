<?php

namespace App\Http\Requests\Inventory;

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
            'name_en' => 'required|unique:inventory',
            'name_ar' => 'required|unique:inventory',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Item Name is required.',
            'name_en.unique' => 'This Item  Already Exist.',
            'name_ar.required' => 'Item Name is required.',
            'name_ar.unique' => 'This Item  Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name_en' => 'Item English Name',
            'name_ar' => 'Item Arabic Name',
        ];
    }
}
