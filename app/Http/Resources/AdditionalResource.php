<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalResource extends JsonResource
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
            'product_id'            => (int) $this->product_id,
            'observations'          => (string) $this->observations,
            'wholesale_price'       => $this->wholesale_price,
            'dozen_price'           => $this->dozen_price,
            'special_price'         => $this->special_price,
            'product_image_path'    => (string) $this->product_image_path,
            'product_image_path_1'  => (string) $this->product_image_path_1,
            'links' => [
                [
                    'rel'       => 'self',
                    'href'      => route('additionals.show', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('additionals.update', $this->id),
                    'action'    => 'PUT',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('additionals.destroy', $this->id),
                    'action'    => 'DELETE',
                ],
                [
                    'rel'       => 'additional.product',
                    'href'      => route('additionals.products.index', $this->id),
                    'action'    => 'GET',
                ]
            ]
        ];
    }
}
