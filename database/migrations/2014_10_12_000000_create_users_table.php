<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 6:40 PM.
 *
 * Copyright (c) : This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

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
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->default('');
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->unsignedSmallInteger('department_id')->nullable();
            $table->unsignedSmallInteger('group_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('password');
            $table->string('token')->nullable();
            $table->integer('active')->default(0);
            $table->rememberToken();
            $table->timestamp('password_change_at')->nullable();
            $table->timestamps();

//            $table->foreign('department_id')->references('id')->on('departments');
//            $table->foreign('group_id')->references('id')->on('groups');
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
