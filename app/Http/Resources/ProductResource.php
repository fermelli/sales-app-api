<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\AdditionalResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $additionalInformationLinks = $this['additional'] ?
            [
                [
                    'rel'       => 'product.additional',
                    'href'      => route('products.additionals.index', $this->id),
                    'action'    => 'GET',
                ],
            ] :
            [
                [
                    'rel'       => 'product.additional',
                    'href'      => route('products.additionals.store', $this->id),
                    'action'    => 'POST',
                ],
            ];
        return [
            'id'                => (int) $this->id,
            'category_id'       => $this->subcategory->category->id,
            'subcategory_id'    => (int) $this->subcategory_id,
            'unit_id'           => (int) $this->unit_id,
            'additional_id'     => $this['additional'] ? (int) $this['additional']['id'] : null,
            'code'              => (string) $this->code,
            'name'              => (string) $this->name,
            'quantity'          => (int) $this->stock,
            'sale_price'        => $this->sale_price,
            'purchase_price'    => $this->purchase_price,
            'additional'        => new AdditionalResource($this['additional']),
            'links' => [
                [
                    'rel'       => 'self',
                    'href'      => route('products.show', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('products.update', $this->id),
                    'action'    => 'PUT',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('products.destroy', $this->id),
                    'action'    => 'DELETE',
                ],
                [
                    'rel'       => 'product.subcategory',
                    'href'      => route('products.subcategories.index', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'product.unit',
                    'href'      => route('products.units.index', $this->id),
                    'action'    => 'GET',
                ],
                ...$additionalInformationLinks,
            ],
        ];
    }
}
