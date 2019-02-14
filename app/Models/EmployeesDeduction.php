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

/**
 * Class EmployeesDeduction.
 *
 * @package namespace App\Models;
 */
class EmployeesDeduction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deduction_id',
        'amount',
        'employee_id',
        'start_period',
        'end_period'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function deduction()
    {
        return $this->belongsTo(
            Deduction::class,
            'deduction_id',
            'id',
            'employeeDeduction'
        );
    }

}
