<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBranchesTable.
 */
class CreateBranchesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('slug');
			$table->string('email');
			$table->string('token', 24);
			$table->string('telephone');
			$table->string('physical_address');
			$table->unsignedTinyInteger('country_id');
			$table->unsignedTinyInteger('city_id');
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
		Schema::drop('branches');
	}
}
