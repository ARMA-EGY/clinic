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
            'name' => 'required|unique:inventory,name,'.$this->inventory->id,
            'stock' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Item Name is required.',
            'name.unique' => 'This Item  Already Exist.',
            'stock.required' => 'stock is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Item Name',
        ];
    }
}
