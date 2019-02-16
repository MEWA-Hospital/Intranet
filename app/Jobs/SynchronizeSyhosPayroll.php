<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Jobs;

use App\Models\Payroll;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SynchronizeSyhosPayroll
{
    use  DispatchesJobs, InteractsWithQueue, Queueable, SerializesModels;

    protected $databaseConnections = [];

    protected $currentMonth = null;

    /**
     * SynchronizeSyhosPayroll constructor.
     */
    public function __construct()
    {
        $this->databaseConnections = [
            config('database.connections.contract'),
            config('database.connections.locum'),
        ];


        $this->currentMonth = Carbon::now()->format('ym');
    }

    public function handle()
    {
        foreach ($this->databaseConnections as $connection) {
            $results = DB::connection($connection)
                ->table('payroll')
                ->select('*')
                ->where('Payroll_Deleted', '0')
                ->where('Payroll_Paymonth', $this->currentMonth)
                ->get();

            do {
                if ($this->connection = 'contract') {
                    $results->map(function ($result) {
                        Payroll::updateOrCreate([
                            'allowances'       => $result->Allowances,
                            'basic_pay'        => $result->BasicPay,
                            'benefits'         => $result->Benefits,
                            'contributions'    => $result->Contributions,
                            'deductions'       => $result->Deductions,
                            'employee_id'      => $result->Payroll_EmpID,
                            'gross_pay'        => $result->Grosspaye,
                            'net_pay'          => $result->Netpay,
                            'nhif'             => $result->NHIF,
                            'nssf'             => $result->NSSF,
                            'other_income'     => $result->OtherIncome,
                            'overtime'         => $result->Overtime,
                            'paye'             => $result->PAYE,
                            'payroll_month'    => $result->Payroll_Paymonth,
                            'pay_date'         => $result->PayDate,
                            'pension'          => $result->Pension,
                            'tax_relief'       => $result->TaxRelief,
                            'taxable_pay'      => $result->Taxablepay,
                            'total_deductions' => $result->TotalDeductions
                        ]);
                    });
                }

                if ($this->connection = 'locum') {
                    $results->map(function ($result) {
                        DB::table('locum_payroll')
                            ->updateOrInsert([
                                'allowances'       => $result->Allowances,
                                'basic_pay'        => $result->BasicPay,
                                'benefits'         => $result->Benefits,
                                'contributions'    => $result->Contributions,
                                'deductions'       => $result->Deductions,
                                'employee_id'      => $result->Payroll_EmpID,
                                'gross_pay'        => $result->Grosspaye,
                                'net_pay'          => $result->Netpay,
                                'nhif'             => $result->NHIF,
                                'nssf'             => $result->NSSF,
                                'other_income'     => $result->OtherIncome,
                                'overtime'         => $result->Overtime,
                                'paye'             => $result->PAYE,
                                'payroll_month'    => $result->Payroll_Paymonth,
                                'pay_date'         => $result->PayDate,
                                'pension'          => $result->Pension,
                                'tax_relief'       => $result->TaxRelief,
                                'taxable_pay'      => $result->Taxablepay,
                                'total_deductions' => $result->TotalDeductions
                            ]);
                    });
                }

            } while ($results);
        }
    }

}
