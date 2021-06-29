<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:services',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category Name is required.',
            'name.unique' => 'This Category Already Exist.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Category Name',
        ];
    }
}
