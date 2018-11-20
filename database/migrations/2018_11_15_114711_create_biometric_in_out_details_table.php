<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBiometricInOutDetailsTable.
 */
class CreateBiometricInOutDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biometric_in_out_details', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->timestamp('date');
            $table->string('flag');
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
		Schema::drop('biometric_in_out_details');
	}
}
