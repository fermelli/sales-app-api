<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = App\Subcategory::all();
        $units = App\Unit::all();
        $products = factory(App\Product::class, 20)->make();
        $products->each(function ($product) use ($subcategories, $units) {
            $subcategory = $subcategories->random();
            $unit = $units->random();
            $product->subcategory()->associate($subcategory);
            $product->unit()->associate($unit);
            $product->save();
        });
    }
}
