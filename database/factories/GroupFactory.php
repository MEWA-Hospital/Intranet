<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return [
        'name'         => $faker->name,
        'mailing_list' => $faker->safeEmail
    ];
});
