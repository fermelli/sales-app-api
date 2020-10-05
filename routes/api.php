<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * PRODUCTS
 */
Route::patch('products/{id}/restore',           'Product\ProductController@restore')->name('products.restore');
Route::apiResource('products',                  'Product\ProductController');
Route::apiResource('products.subcategories',    'Product\ProductSubcategoryController', ['only' => ['index']]);
Route::apiResource('products.units',            'Product\ProductUnitController',        ['only' => ['index']]);
Route::apiResource('products.additionals',      'Product\ProductAdditionalController',  ['only' => ['index', 'store']]);

/**
 * ADDITIONALS
 */
Route::apiResource('additionals',           'Additional\AdditionalController');
Route::apiResource('additionals.products',  'Additional\AdditionalProductController', ['only' => ['index']]);

/**
 * CATEGORIES
 */
Route::apiResource('categories',                'Category\CategoryController');
Route::apiResource('categories.subcategories',  'Category\CategorySubcategoryController', ['only' => ['index']]);

/**
 * SUBCATEGORIES
 */
Route::apiResource('subcategories',             'Subcategory\SubcategoryController');
Route::apiResource('subcategories.categories',  'Subcategory\SubcategoryCategoryController',    ['only' => ['index']]);
Route::apiResource('subcategories.products',    'Subcategory\SubcategoryProductController',     ['only' => ['index']]);

/**
 * UNITS
 */
Route::apiResource('units', 'Unit\UnitController');

/**
 * ROUTE NO FOUND
 */
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});