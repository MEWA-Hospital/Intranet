<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

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
