<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    /**
     * Display the unit of specified product.
     * @param \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $unit = $product->unit;
        return response()->json([
            'message'   => 'The unit to product was getted successfully.',
            'unit'      => $unit,
        ], 200);
    }
}
