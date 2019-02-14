<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Payroll.
 *
 * @package namespace App\Models;
 */
class Payroll extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'allowances',
        'basic_pay',
        'benefits',
        'contributions',
        'deductions',
        'employee_id',
        'gross_pay',
        'net_pay',
        'nhif',
        'nssf',
        'other_income',
        'overtime',
        'paye',
        'payroll_month',
        'pay_date',
        'pension',
        'tax_relief',
        'taxable_pay',
        'total_deductions',
    ];

}
