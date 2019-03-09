<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\DTO;


use App\Http\Requests\PayrollRequest;
use Spatie\DataTransferObject\DataTransferObject;

class PayrollData extends DataTransferObject
{
    /* @var string */
    public $allowances;

    /* @var string */
    public $basic_pay;

    /* @var string */
    public $benefits;

    /* @var string */
    public $contributions;

    /* @var string */
    public $deductions;

    /* @var integer */
    public $employee_id;

    /* @var integer */
    public $user_id;

    /* @var string */
    public $gross_pay;

    /* @var string */
    public $net_pay;

    /* @var string */
    public $nhif;

    /* @var string */
    public $nssf;

    /* @var string */
    public $other_income;

    /* @var string */
    public $overtime;

    /* @var string */
    public $paye;

    /* @var string */
    public $payroll_month;

    /* @var string */
    public $pay_date;

    /* @var string */
    public $pension;

    /* @var string */
    public $tax_relief;

    /* @var string */
    public $taxable_pay;

    /* @var string */
    public $total_deductions;

    public static function fromRequest(PayrollRequest $request): self
    {
        return new self([
            'allowances'       => $request->get('allowances'),
            'basic_pay'        => $request->get('basic_pay'),
            'benefits'         => $request->get('benefits'),
            'contributions'    => $request->get('contributions'),
            'deductions'       => $request->get('deductions'),
            'employee_id'      => $request->get('employee_id'),
            'gross_pay'        => $request->get('gross_pay'),
            'net_pay'          => $request->get('net_pay'),
            'nhif'             => $request->get('nhif'),
            'nssf'             => $request->get('nssf'),
            'other_income'     => $request->get('other_income'),
            'overtime'         => $request->get('overtime'),
            'paye'             => $request->get('paye'),
            'payroll_month'    => $request->get('payroll_month'),
            'pay_date'         => $request->get('pay_date'),
            'pension'          => $request->get('pension'),
            'tax_relief'       => $request->get('tax_relief'),
            'taxable_pay'      => $request->get('taxable_pay'),
            'total_deductions' => $request->get('total_deductions'),
        ]);
    }

}
