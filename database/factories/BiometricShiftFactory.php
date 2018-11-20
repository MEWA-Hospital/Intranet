<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'             => $faker->sentence,
        'shift_start_time' => $faker->time(),
        'shift_end_time'   => $faker->time(),
        'break_start_time' => $faker->time(),
        'break_end_time'   => $faker->time(),
    ];
});
