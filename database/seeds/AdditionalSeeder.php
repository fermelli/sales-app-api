<?php

use Illuminate\Database\Seeder;

class AdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Product::doesntHave('additional')->get();
        $countProducts = $products->count();
        $randomProducts = $products->random(round($countProducts * 0.6666));
        $randomProducts->each(function ($product) {
            $additional = factory(App\Additional::class)->make([
                'wholesale_price'   => $product->sale_price * 0.95,
                'dozen_price'       => $product->sale_price * 0.97,
                'special_price'     => $product->sale_price * 0.93,
            ]);
            $product->additional()->save($additional);
        });
    }
}
