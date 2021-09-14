<?php

namespace App\Http\Requests\Expenses;

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
            'category_id' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Item Name is required.',
            'category_id.required' => 'Category is required.',
            'price.required' => 'Price is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Item Name',
        ];
    }
}
