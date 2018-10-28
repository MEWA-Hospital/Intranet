<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('email')->nullable();
            $table->string('mailing_list')->nullable();
            $table->string('token', 24);
            $table->string('telephone')->nullable();
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
