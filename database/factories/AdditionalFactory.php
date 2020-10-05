<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Additional;
use Faker\Generator as Faker;

$factory->define(Additional::class, function (Faker $faker) {
    $price = $faker->randomFloat(4, 1, 99);
    $factor = $faker->randomFloat(4, 1.10, 1.40);
    $img = $faker->randomElement([$faker->unique()->imageUrl(320, 320, 'abstract'), null]);
    $img1 = $faker->randomElement([$faker->unique()->imageUrl(320, 320, 'abstract'), null]);
    return [
        'observations'          => $faker->optional()->text(255),
        'wholesale_price'       => $faker->randomElement([$price * ($factor - 0.05), null]),
        'dozen_price'           => $faker->randomElement([$price * ($factor - 0.03), null]),
        'special_price'         => $faker->randomElement([$price * ($factor - 0.07), null]),
        'product_image_path'    => $img,
        'product_image_path_1'  => $img ? $img1 : null,
    ];
});
