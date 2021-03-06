<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Faker\Generator as Faker;

$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
//        'branch_id'    => factory(App\Models\Branch::class)->create()->id,
        'name'         => $faker->name,
        'slug'         => $faker->slug,
        'token'        => str_random(24),
        'email'        => $faker->safeEmail,
        'mailing_list' => $faker->safeEmail
    ];
});
