<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username'                 => $faker->unique()->userName,
        'slug'                     => $faker->slug,
        'telephone'                => $faker->phoneNumber,
        'email'                    => $faker->unique()->safeEmail,
        'password'                 => bcrypt('password'),
        'token'                    => str_random(10),
        'isActive'                 => $faker->boolean,
        'changed_default_password' => $faker->boolean,
        'remember_token'           => str_random(10),
    ];
});
