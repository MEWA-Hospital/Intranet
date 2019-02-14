<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\EmployeeEmail;

/**
 * Class EmployeeEmailTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeeEmailTransformer extends TransformerAbstract
{
    /**
     * Transform the EmployeeEmail entity.
     *
     * @param \App\Models\EmployeeEmail $model
     *
     * @return array
     */
    public function transform(EmployeeEmail $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
