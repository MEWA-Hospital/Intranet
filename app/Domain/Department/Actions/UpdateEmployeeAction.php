<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\Actions;

use Domain\Department\DTO\EmployeeData;
use Domain\Department\Models\Employee;

class UpdateEmployeeAction
{
    public function __invoke(EmployeeData $employeeData, $id): void
    {
        $employee = Employee::find($id);

        $employee->update([
            'user_id'          => $employeeData->user_id ?: null,
            'bank_id'          => $employeeData->bank_id ?: null,
            'bank_branch_id'   => $employeeData->bank_branch_id ?: null,
            'department_id'    => $employeeData->department_id,
            'employee_type_id' => $employeeData->employee_type_id,
            'biometric_code'   => $employeeData->biometric_code,
            'national_id_no'   => $employeeData->national_id_no,
            'extension_id'     => $employeeData->extension_id ?: null,
            'designation'      => $employeeData->designation ?: null,
            'bank_account_no'  => $employeeData->bank_account_no,
            'kra_pin'          => $employeeData->kra_pin,
            'nssf_no'          => $employeeData->nssf_no,
            'nhif_no'          => $employeeData->nhif_no,
            'name'             => $employeeData->name,
            'gender'           => $employeeData->gender,
            'dob'              => $employeeData->dob,
            'date_employed'    => $employeeData->date_employed,
            'physical_address' => $employeeData->physical_address,
            'syhos_emp_id'     => $employeeData->syhos_emp_id,
        ]);
    }
}
