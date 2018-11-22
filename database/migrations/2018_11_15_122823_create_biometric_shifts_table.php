<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBiometricShiftsTable.
 */
class CreateBiometricShiftsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biometric_shifts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->time('shift_start_time');
            $table->time('shift_end_time');
            $table->time('break_start_time');
            $table->time('break_end_time');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('biometric_shifts');
	}
}
