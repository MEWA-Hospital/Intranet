<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Transformers;

use App\Models\EmployeesDeduction;
use League\Fractal\TransformerAbstract;

/**
 * Class EmployeesDeductionTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeesDeductionTransformer extends TransformerAbstract
{
    /**
     * Transform the EmployeesDeduction entity.
     *
     * @param \App\Models\EmployeesDeduction $model
     *
     * @return array
     */
    public function transform(EmployeesDeduction $model)
    {
        return [
            'id'           => (int)$model->id,
            'deduction_id' => (int)$model->deduction_id,
            'amount'       => $model->amount,
            'employee_id'  => $model->employee_id,
            'start_period' => $model->start_period,
            'end_period'   => $model->end_period,
            'created_at'   => $model->created_at,
            'updated_at'   => $model->updated_at
        ];
    }
}
