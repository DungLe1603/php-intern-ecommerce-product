<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|unique:products',
            'quantity' => 'required|numeric|min:0|max:200',
            'description' => 'required',
            'configuration' => 'required',
            'price' => 'required|numeric|min:1|max:10000',
            'image' => 'required|image:jpeg,jpg,png'
        ];
    }
}
