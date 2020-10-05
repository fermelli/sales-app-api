<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'abbreviation'  => (string) $this->abbreviation,
            'links' => [
                [
                    'rel'       => 'self',
                    'href'      => route('units.show', $this->id),
                    'action'    => 'GET',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('units.update', $this->id),
                    'action'    => 'PUT',
                ],
                [
                    'rel'       => 'self',
                    'href'      => route('units.destroy', $this->id),
                    'action'    => 'DELETE',
                ],
            ]
        ];
    }
}
