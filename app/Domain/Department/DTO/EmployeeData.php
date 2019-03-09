<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\DTO;


use App\Http\Requests\EmployeeRequest;
use Spatie\DataTransferObject\DataTransferObject;

class EmployeeData extends DataTransferObject
{
    /** @var int */
    public $user_id;

    /** @var int */
    public $department_id;

    /** @var string */
    public $biometric_code;

    /** @var string */
    public $employee_type_id;

    /** @var int */
    public $extension_id;

    /** @var string */
    public $staff_no;

    /** @var string */
    public $designation;

    /** @var string */
    public $national_id_no;

    /** @var string */
    public $bank_account_no;

    /** @var integer */
    public $bank_id;

    /** @var integer */
    public $bank_branch_id;

    /** @var string */
    public $syhos_emp_id;

    /** @var string */
    public $kra_pin;

    /** @var string */
    public $nssf_no;

    /** @var string */
    public $nhif_no;

    /** @var string */
    public $name;

    /** @var string */
    public $slug;

    /** @var string */
    public $gender;

    /** @var string */
    public $dob;

    /** @var string */
    public $date_employed;

    /** @var string */
    public $physical_address;


    public static function fromRequest(EmployeeRequest $request): self
    {
        return new self([
            'bank_id'          => $request->get('bank_id'),
            'bank_branch_id'   => $request->get('bank_branch_id'),
            'syhos_emp_id'     => $request->get('syhos_emp_id'),
            'user_id'          => $request->get('user_id') ?: null,
            'department_id'    => $request->get('department_id'),
            'employee_type_id' => $request->get('employee_type_id'),
            'biometric_code'   => $request->get('biometric_code'),
            'national_id_no'   => $request->get('national_id_no'),
            'extension_id'     => $request->get('extension_id') ?: null,
            'designation'      => $request->get('designation'),
            'bank_account_no'  => $request->get('bank_account_no'),
            'kra_pin'          => $request->get('kra_pin'),
            'nssf_no'          => $request->get('nssf_no'),
            'nhif_no'          => $request->get('nhif_no'),
            'name'             => $request->get('name'),
            'gender'           => $request->get('gender'),
            'dob'              => $request->get('dob'),
            'date_employed'    => $request->get('date_employed'),
            'physical_address' => $request->get('physical_address'),
        ]);
    }

    public static function fromArray($request): self
    {
        return new self([
            'bank_id'          => $request['bank_id'],
            'bank_branch_id'   => $request['bank_branch_id'],
            'syhos_emp_id'     => $request['syhos_emp_id'],
            'user_id'          => $request['user_id'] ?: null,
            'department_id'    => $request['department_id'],
            'employee_type_id' => $request['employee_type_id'],
            'biometric_code'   => $request['biometric_code'],
            'national_id_no'   => $request['national_id_no'],
            'extension_id'     => $request['extension_id'] ?: null,
            'designation'      => $request['designation'],
            'bank_account_no'  => $request['bank_account_no'],
            'kra_pin'          => $request['kra_pin'],
            'nssf_no'          => $request['nssf_no'],
            'nhif_no'          => $request['nhif_no'],
            'name'             => $request['name'],
            'gender'           => $request['gender'],
            'dob'              => $request['dob'],
            'date_employed'    => $request['date_employed'],
            'physical_address' => $request['physical_address'],
        ]);
    }
}
