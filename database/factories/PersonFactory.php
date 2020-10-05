<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    $paternal_surname_optional = $faker->optional()->lastName;
    $maternal_surname = $faker->lastName;
    $maternal_surname_optional = $faker->randomElement([$maternal_surname, null]);
    return [
        'names'             => $faker->firstName(),
        'paternal_surname'  => $paternal_surname_optional,
        'maternal_surname'  => $paternal_surname_optional ? $maternal_surname_optional : $maternal_surname,
    ];
});
