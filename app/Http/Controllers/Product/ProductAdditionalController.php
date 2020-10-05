<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Additional;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdditionalRequest;
use App\Http\Resources\AdditionalResource;

class ProductAdditionalController extends Controller
{
    /**
     * Display the additional of specified product.
     * @param \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $additional = $product->additional;
        return response()->json([
            'message'       => 'The additional to product was getted successfully.',
            'additional'    => new AdditionalResource($additional),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdditionalRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(AdditionalRequest $request, Product $product)
    {
        $validated = $request->validated();
        $additional = new Additional;
        $additional->fill($validated);
        $product->additional()->save($additional);
        return response()->json([
            'message'       => 'The additional of product was created successfully.',
            'additional'    => new AdditionalResource($additional),
        ], 401);
    }
}
