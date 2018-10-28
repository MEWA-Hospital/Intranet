<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
        'branch_id'    => factory(App\Models\Branch::class)->create()->id,
        'name'         => $faker->name,
        'slug'         => $faker->slug,
        'token'        => str_random(24),
        'email'        => $faker->safeEmail,
        'mailing_list' => $faker->safeEmail
    ];
});
