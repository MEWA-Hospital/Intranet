<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateEmployeesTable.
 */
class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->unsignedInteger('biometric_code')->nullable();
            $table->unsignedInteger('employee_type_id')->nullable();
            $table->unsignedSmallInteger('country_id')->nullable();
            $table->unsignedInteger('bank_id')->nullable();
            $table->unsignedInteger('bank_branch_id')->nullable();
            $table->string('national_id_no')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('nssf_no')->nullable();
            $table->string('nhif_no')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('slug');
            $table->enum('gender', ['MALE', 'FEMALE'])->default('MALE');
            $table->date('dob')->nullable();
            $table->date('date_employed')->nullable();
            $table->enum('marital_status', ['SINGLE', 'MARRIED'])->default('SINGLE');
            $table->string('physical_address')->nullable();
            $table->boolean('isActive')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
