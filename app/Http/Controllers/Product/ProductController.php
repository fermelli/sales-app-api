<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Additional;
use App\Models\ProductView;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductViewCollection;
use Illuminate\Support\Facades\DB;

class ProductController extends ApiController
{
    /**
     * Display a product view table.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query();
        $builder = ProductView::query();

        if ($request->filled('category')) {
            $category = $query['category'];
            is_numeric($category) ?
                $builder->whereCategoryId($category) :
                $builder->whereCategoryName($category);
        }

        if ($request->filled('subcategory')) {
            $subcategory = $query['subcategory'];
            is_numeric($subcategory) ?
                $builder->whereSubcategoryId($subcategory) :
                $builder->whereSubcategoryName($subcategory);
        }

        if ($request->filled('name')) {
            $builder->whereNameLike("%{$query['name']}%");
        }

        if ($request->filled('code')) {
            $builder->whereCodeLike("%{$query['code']}%");
        }

        if ($request->filled('disabled')) {
            $request->boolean('disabled') ?
                $builder->whereNotNullDeleteAt() :
                $builder->whereNullDeleteAt();
        }

        $pagination = $builder->latest()->paginate();

        if ($pagination->isEmpty()) {
            return response()->json([
                'message' => 'There are no products with those search parameters.',
            ], 404);
        }

        $totalPrices = [
            'sales'      => round(DB::table('product_view')->sum('total_sale_price'), 4),
            'purchases'  => round(DB::table('product_view')->sum('total_purchase_price'), 4),
        ];

        return response()->json([
            'message'       => 'The products view was getted successfully.',
            'pagination'    => new ProductViewCollection($pagination),
            'total_prices'  => $totalPrices,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $product = new Product;
        $product->fill($validated);
        $product->save();

        if (count($validated['additional'])) {
            $additional = new Additional;
            $additional->product_id = $product->id;
            $additional->fill($validated['additional']);
            $product->additional()->save($additional);
        }

        $data = new ProductResource($product);

        return $this->successResponse($data, 'product', 'The product was created successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = new ProductResource($product);

        return $this->successResponse($data, 'product', 'The product was getted successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product->fill($validated);
        $product->save();

        if (count($validated['additional'])) {
            $additional = $product->additional;
            if (isset($additional)) {
                $additional->fill($validated['additional']);
                $additional->save();
            } else {
                $additional = new Additional;
                $additional->fill($validated['additional']);
                $product->additional()->save($additional);
                $product->refresh();
            }
        }

        $data = new ProductResource($product);

        return $this->successResponse($data, 'product', 'The product was updated successfully.');
    }

    /**
     * Soft removal of the specified model.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json([
                'message' => 'The product was deleted successfully.',
            ], 200);
        }
    }

    /**
     * Restore the specified model with soft deleted.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        if (!isset($product)) {
            return response()->json([
                'message' => 'The product to restore cannot be found.',
            ], 404);
        }

        $product->restore();
        return response()->json([
            'message' => 'The product was restored successfully.',
            'product' => new ProductResource($product),
        ], 200);
    }
}
