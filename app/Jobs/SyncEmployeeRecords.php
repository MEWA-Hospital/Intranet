<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Jobs;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SyncEmployeeRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Employee.
     *
     * @return string
     */
    public $employee;

    /**
     * Create a new job instance.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $employee = \DB::connection('sqlsrv')->table('Employees')->where('Emp_IDNo', '32320964')->get()->toArray();
        if ($employee) {
            $employeeColumn = [];
            foreach ($employee as $e) {
                $employeeColumn['name'] = $e->Emp_Name;
                $employeeColumn['staff_no'] = $e->Emp_StaffNo;
                $employeeColumn['national_id_no'] = $e->Emp_IDNo;
                $employeeColumn['kra_pin'] = $e->Emp_PinNo;
                $employeeColumn['nssf_no'] = $e->Emp_NSSFNo;
                $employeeColumn['nhif_no'] = $e->Emp_NHIFNo;
                $employeeColumn['bank_account_no'] = $e->Emp_BankAccountNo;
                $employeeColumn['gender'] = $e->Emp_Gender;
                $employeeColumn['dob'] = $e->Emp_DOB;
                $employeeColumn['physical_address'] = $e->Emp_PhysicalAddress;
                $employeeColumn['date_employed'] = $e->Emp_Date;
//            $employeeColumn['marital_status'] = $e->marital_status;
//            $employeeColumn['reports_to_id'] = $e->Emp_ReportsToID;
                $employeeColumn['bank_id'] = $e->Emp_BankID;
                $employeeColumn['employee_type_id'] = $e->Emp_Type;
            }
            $I = Employee::where('national_id_no', $e->Emp_IDNo)->first();
            $I->update($employeeColumn);
        }
    }
}
