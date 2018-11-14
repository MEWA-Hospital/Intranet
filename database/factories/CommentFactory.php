<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {

    $commentable = [
        App\Models\News::class,
        App\Models\User::class,
    ];
    $commentable_type = $faker->randomElement($commentable);
    $commentable = factory($commentable_type)->create();

    return [
        'body'             => $faker->sentence,
        'commentable_type' => $commentable_type,
        'commentable_id'   => $commentable->id,
        'user_id'          => factory(App\Models\User::class)->create()->id
    ];
});
