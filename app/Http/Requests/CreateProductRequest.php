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
            'product_name' => 'required',
            'quantity' => 'required|numeric|min:1|max:100',
            'description' => 'required',
            'configuration' => 'required',
            'price' => 'required|numeric|min:1|max:1000',
            'image' => 'required|image:jpeg,jpg,png'
        ];
    }
}
