<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;


class ProductRequest extends FormRequest
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
            'subcategory_id'    => 'required|exists:App\Models\Subcategory,id',
            'unit_id'           => 'exists:App\Models\Unit,id',
            'code'              => [
                'required', 'string', 'max:72',
                Rule::unique('products')->ignore($this->product),
            ],
            'name'              => [
                'required', 'string', 'max:128',
                Rule::unique('products')->ignore($this->product),
            ],
            'sale_price'        => 'required|numeric|between:0,9999.9999',
            'purchase_price'    => 'required|numeric|between:0,9999.9999',
            'additional'        => 'array',

            'additional.observations'           => 'nullable|string|max:255',
            'additional.wholesale_price'        => 'nullable|numeric|between:0,9999.9999',
            'additional.dozen_price'            => 'nullable|numeric|between:0,9999.9999',
            'additional.special_price'          => 'nullable|numeric|between:0,9999.9999',
            'additional.product_image_path'     => 'nullable|string|max:255',
            'additional.product_image_path_1'   => 'nullable|string|max:255',
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
            'subcategory_id'    => 'subcategoria',
            'unit_id'           => 'unidad',
            'code'              => 'código',
            'name'              => 'nombre del producto',
            'sale_price'        => 'precio de venta',
            'purchase_price'    => 'precio de compra',
            'additional'        => 'información adicional',

            'additional.observations'           => 'observaciones',
            'additional.wholesale_price'        => 'precio al por mayor',
            'additional.dozen_price'            => 'precio por docena',
            'additional.special_price'          => 'precio especial',
            'additional.product_image_path'     => 'ruta imagen',
            'additional.product_image_path_1'   => 'ruta otra imagen',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'additional' => Arr::only($this->additional, [
                'observations',
                'wholesale_price',
                'dozen_price',
                'special_price',
                'product_image_path',
                'product_image_path_1'
            ]),
        ]);
    }
}
