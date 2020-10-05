<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity;
use Faker\Generator as Faker;

$factory->define(Entity::class, function (Faker $faker) {
    return [
        'ci_nit'    => $faker->unique()->ean8,
        'address'   => $faker->boolean(10) ? $faker->streetAddress : null,
        'phone'     => $faker->boolean(5) ? $faker->e164PhoneNumber : null,
        'cellphone' => $faker->boolean(3) ? $faker->tollFreePhoneNumber : null,
        'email'     => $faker->boolean(1) ? $faker->companyEmail : null,
    ];
});

$factory->state(Entity::class, 'company', function (Faker $faker) {
    return [
        'ci_nit'    => $faker->unique()->ean13,
        'address'   => $faker->boolean(90) ? $faker->streetAddress : null,
        'phone'     => $faker->boolean(95) ? $faker->e164PhoneNumber : null,
        'cellphone' => $faker->boolean(15) ? $faker->tollFreePhoneNumber : null,
        'email'     => $faker->boolean(18) ? $faker->companyEmail : null, 
    ];
});
