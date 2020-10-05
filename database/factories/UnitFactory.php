<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    $validateSize = function($word) {
        return strlen($word) === 3;
    };
    return [
        'name'          => $faker->unique()->word,
        'abbreviation'  => $faker->unique()->lexify('???.'),
    ];
});
