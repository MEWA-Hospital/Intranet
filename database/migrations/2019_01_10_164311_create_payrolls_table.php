<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
		Schema::create('payrolls', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->float('basic_pay');
            $table->float('allowances')->nullable();
            $table->float('other_income')->nullable();
            $table->float('gross_pay');
            $table->float('benefits')->default(0.0);
            $table->float('pension')->default(0.0);
            $table->float('overtime')->nullable();
            $table->float('nssf')->default(0.0);
            $table->float('taxable_pay')->default(0.0);
            $table->float('gross_paye')->default(0.0);
            $table->float('paye')->default(0.0);
            $table->float('tax_relief')->default(0.0);
            $table->float('nhif')->default(0.0);
            $table->float('deductions')->nullable();
            $table->float('contributions')->nullable();
            $table->float('total_deductions')->nullable();
            $table->float('net_pay')->nullable();
            $table->timestamp('pay_date');
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
