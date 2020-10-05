<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSubcategoryController extends Controller
{
    /**
     * Display the subcateogory of specified product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $subcategory = $product->subcategory;
        return response()->json([
            'message'       => 'The subcategory to product was getted successfully.',
            'subcategory'   => $subcategory,
        ], 200);
    }
}
