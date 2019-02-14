<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
        'user_id'          => factory(App\Models\User::class)->create()->id,
        'department_id'    => factory(App\Models\Department::class)->create()->id,
        'designation_id'   => 1,
        'biometric_code'   => $faker->numberBetween(1, 300),
        'name'             => $faker->name,
        'staff_no'         => $faker->randomNumber(),
        'dob'              => $faker->dateTimeInInterval('-60 years', '+5 days'),
        'date_employed'    => $faker->date(),
        'physical_address' => $faker->city,
        'national_id_no'   => str_random(10),
        'kra_pin'          => str_random(6),
        'nssf_no'          => str_random(6),
        'nhif_no'          => str_random(6),
    ];
});
