<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence,
        'body'          => $faker->sentence,
        'department_id' => factory(App\Models\Department::class)->create()->id,
        'user_id'       => factory(App\Models\User::class)->create()->id,
    ];
});
