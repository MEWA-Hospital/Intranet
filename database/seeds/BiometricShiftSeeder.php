<?php

use Illuminate\Database\Seeder;

class BiometricShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BiometricShift::class, 7)->create();
    }
}
