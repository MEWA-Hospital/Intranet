<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	public function up()
	{
		Schema::create('tagging_tags', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug', 125)->index();
			$table->string('name', 125);
			$table->boolean('suggest')->default(false);
			$table->integer('count')->unsigned()->default(0); // count of how many times this tag was used
		});
	}

	public function down()
	{
		Schema::drop('tagging_tags');
	}
}
