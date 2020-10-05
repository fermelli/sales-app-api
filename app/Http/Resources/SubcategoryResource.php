<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;


class SubcategoryResource extends JsonResource
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
            'id'        => (int) $this->id,
            'name'      => (string) $this->name,
            'category'  => $this->when($request->path() === 'api/subcategories', new CategoryResource($this->category)),
            'links' => [
                [
                    'rel'       => 'self',
                    'href'      => route('subcategories.show', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('subcategories.update', $this->id),
                    'action'    => 'PUT',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('subcategories.destroy', $this->id),
                    'action'    => 'DELETE',
                ],
                [
                    'rel'       => 'subcategory.category',
                    'href'      => route('subcategories.categories.index', $this->id),
                    'action'    => 'GET',
                ],
            ]
        ];
    }
}
