<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductViewCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'App\Http\Resources\ProductViewResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $totalSales  = $this->collection->reduce(function ($accumulator, $item) {
            return $accumulator + $item->resource->total_sale_price;
        });

        $totalPurchases = $this->collection->reduce(function ($accumulator, $item) {
            return $accumulator + $item->resource->total_purchase_price;
        });

        $condition = $this->collection->count();
        return [
            'data'              => $this->when($condition, $this->collection),
            'total_sales'       => $this->when($condition, round($totalSales, 4)),
            'total_purchases'   => $this->when($condition, round($totalPurchases, 4)),
            'links'             => $this->when($condition, [
                'first' => $this->url(1),
                'last'  => $this->url($this->lastPage()),
                'next'  => $this->nextPageUrl(),
                'prev'  => $this->previousPageUrl(),
            ]),
            'meta'              => $this->when($condition, [
                'current_page'  => $this->currentPage(),
                'from'          => $this->firstItem(),
                'last_page'     => $this->lastPage(),
                'path'          => $this->path(),
                'per_page'      => $this->perPage(),
                'to'            => $this->lastItem(),
                'total'         => $this->total(),
            ]),
        ];
    }
}
