<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubcategoryResource;

class CategoryResource extends JsonResource
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
            'id'            => (int) $this->id,
            'name'          => (string) $this->name,
            'subcategories' => $this->when($request->path() === 'api/categories', SubcategoryResource::collection($this->subcategories)),
            'links' => [
                [
                    'rel'       => 'self',
                    'href'      => route('categories.show', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('categories.update', $this->id),
                    'action'    => 'PUT',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('categories.destroy', $this->id),
                    'action'    => 'DELETE',
                ],
                [
                    'rel'       => 'category.subcategories',
                    'href'      => route('categories.subcategories.index', $this->id),
                    'action'    => 'GET',
                ],
            ]
        ];
    }
}
