<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Faker\Generator as Faker;

$factory->define(App\Models\Branch::class, function (Faker $faker) {
    return [
        'name'             => 'MEWA Hodpital',
        'slug'             => $faker->slug,
        'token'            => str_random(24),
        'telephone'        => $faker->phoneNumber,
        'physical_address' => 'Majengo, Mombasa',
        'country_id'       => $faker->randomDigit,
        'city_id'          => $faker->randomDigit,
    ];
});
