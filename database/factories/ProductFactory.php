<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $purchase_price = $faker->randomFloat(4, 1, 99);
    $factor = $faker->randomFloat(4, 1.10, 1.30);
    return [
        'code'              => $faker->unique()->ean13,
        'name'              => $faker->unique()->sentence(),
        'stock'             => rand(10, 100),
        'sale_price'        => $purchase_price * $factor,
        'purchase_price'    => $purchase_price ,
    ];
});
