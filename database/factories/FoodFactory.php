<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Food::class, function (Faker $faker) {
    return [
        'name'         => $faker->sentence,
        'description'          => $faker->sentence,
        'food_group' => $faker->sentence,
        'slug' => $faker->sentence,
    ];
});
