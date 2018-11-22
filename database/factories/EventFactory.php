<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Events::class, function (Faker $faker) {
    return [
        'name'         => $faker->streetAddress,
        'body'          => $faker->sentence,
        'user_id'       => factory(App\Models\User::class)->create()->id,
        'department_id' => factory(App\Models\Department::class)->create()->id,
        'venue'         => $faker->city,
        'start_date'    => $faker->dateTime(),
        'end_date'      => $faker->dateTime()
    ];
});
