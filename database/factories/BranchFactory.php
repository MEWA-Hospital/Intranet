<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 5:56 PM.
 *
 * Copyright (c) : This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

use Faker\Generator as Faker;

$factory->define(App\Models\Branch::class, function (Faker $faker) {
    return [
        'name'             => $faker->name,
        'slug'             => $faker->slug,
        'token'            => str_random(24),
        'telephone'        => $faker->phoneNumber,
        'physical_address' => $faker->streetName,
        'country_id'       => $faker->randomDigit,
        'city_id'          => $faker->randomDigit,
    ];
});
