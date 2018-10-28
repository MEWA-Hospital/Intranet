<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Branch::class, function (Faker $faker) {
    return [
        'name'             => $faker->name,
        'slug'             => $faker->slug,
        'token'            => str_random(24),
        'telephone'        => $faker->phoneNumber,
        'physical_address' => $faker->streetName,
        'country_id'       => $faker->randomDigit,
        'city_id'          => $faker->randomDigit,
    ];
});
