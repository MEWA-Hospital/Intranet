<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 7:23 PM.
 *
 * Copyright (c) : This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
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
        'username'       => $faker->unique()->userName,
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'slug'           => $faker->slug,
        'department_id'  => factory(App\Models\Department::class)->create()->id,
        'group_id'       => factory(App\Models\Group::class)->create()->id,
        'designation'    => $faker->word,
        'telephone'      => $faker->phoneNumber,
        'email'          => $faker->unique()->safeEmail,
        'password'       => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});
