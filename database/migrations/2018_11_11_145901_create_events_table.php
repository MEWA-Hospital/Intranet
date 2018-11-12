<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEventsTable.
 */
class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->String ('title');
            $table->text('description');
            $table->string('venue');
            $table->string('users_id')->nullable();
            $table->string('departments_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
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
		Schema::drop('events');
	}
}
