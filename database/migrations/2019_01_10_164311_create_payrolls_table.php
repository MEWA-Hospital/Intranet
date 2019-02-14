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

/**
 * Class CreatePayrollsTable.
 */
class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('allowances', 19, 4)->nullable();
            $table->decimal('basic_pay', 19, 4);
            $table->decimal('benefits', 19, 4)->nullable();
            $table->decimal('contributions', 19, 4)->nullable();
            $table->decimal('deductions', 19, 4)->nullable();
            $table->string('employee_id', 255);
            $table->decimal('gross_pay', 19, 4)->nullable();
            $table->decimal('net_pay', 19, 4)->nullable();
            $table->decimal('nhif', 19, 4)->nullable();
            $table->decimal('nssf', 19, 4)->nullable();
            $table->decimal('other_income', 19, 4)->nullable();
            $table->decimal('overtime', 19, 4)->nullable();
            $table->decimal('paye', 19, 4)->nullable();
            $table->string('payroll_month');
            $table->dateTime('pay_date');
            $table->decimal('pension', 19, 4)->nullable();
            $table->decimal('tax_relief', 19, 4)->nullable();
            $table->decimal('taxable_pay', 19, 4)->nullable();
            $table->decimal('total_deductions', 19, 4)->nullable();
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
        Schema::drop('payrolls');
    }
}
