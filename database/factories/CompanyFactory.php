<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'          => $faker->unique()->company,
        'area'          => $faker->boolean(25) ? $faker->word : null,
        'fax_number'    => $faker->boolean(10) ? $faker->e164PhoneNumber : null,
    ];
});
