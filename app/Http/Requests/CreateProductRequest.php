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
            'quantity' => 'required',
            'description' => 'required',
            'configuration' => 'required',
            'price' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Product Name Not Null',
            'quantity.required' => 'Quantity Not Null',
            'description.required' => 'Description Not Null',
            'configuration.required' => 'Configuration Not Null',
            'price.required' => 'Price Not Null',
            'image.required' => "You don't have file",
        ];
    }
}
