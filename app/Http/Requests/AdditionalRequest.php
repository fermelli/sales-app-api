<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalRequest extends FormRequest
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
            'observations'           => 'nullable|string|max:255',
            'wholesale_price'        => 'nullable|numeric|between:0,9999.9999',
            'dozen_price'            => 'nullable|numeric|between:0,9999.9999',
            'special_price'          => 'nullable|numeric|between:0,9999.9999',
            'product_image_path'     => 'nullable|string|max:255',
            'product_image_path_1'   => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'observations'           => 'observaciones',
            'wholesale_price'        => 'precio al por mayor',
            'dozen_price'            => 'precio por docena',
            'special_price'          => 'precio especial',
            'product_image_path'     => 'ruta imagen',
            'product_image_path_1'   => 'ruta otra imagen',
        ];
    }
}
