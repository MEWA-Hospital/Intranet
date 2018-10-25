<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->unsignedSmallInteger('department_id')->unique();
            $table->unsignedSmallInteger('group_id');
            $table->string('designation')->nullable();
            $table->date('date_of_birth');
            $table->date('date_of_employment');
            $table->unsignedSmallInteger('employee_type_id');
            $table->unsignedSmallInteger('country_id');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
