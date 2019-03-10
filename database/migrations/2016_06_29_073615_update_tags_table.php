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

class UpdateTagsTable extends Migration {

	public function up()
	{

		Schema::table('tagging_tags', function ($table) {
			$table->integer('tag_group_id')->unsigned()->nullable()->after('id');
			$table->foreign('tag_group_id')->references('id')->on('tagging_tag_groups');
		});

	}


	public function down()
	{
		Schema::table('tagging_tags', function ($table) {
			$table->dropForeign('tagging_tags_tag_group_id_foreign');
			$table->dropColumn('tag_group_id');
		});
	}
}
