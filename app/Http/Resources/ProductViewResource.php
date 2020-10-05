<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => (int) $this->id,
            'code'                  => (string) $this->code,
            'name'                  => (string) $this->name,
            'quantity'              => (int) $this->quantity,
            'sale_price'            => $this->sale_price,
            'purchase_price'        => $this->purchase_price,
            'total_sale_price'      => $this->total_sale_price,
            'total_purchase_price'  => $this->total_purchase_price,
            'deleted_at'            => $this->deleted_at,
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
            ]
        ];
    }
}
