<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

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
