<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Transformers;

use App\Models\Deduction;
use League\Fractal\TransformerAbstract;

/**
 * Class DeductionTransformer.
 *
 * @package namespace App\Transformers;
 */
class DeductionTransformer extends TransformerAbstract
{
    /**
     * Transform the Deduction entity.
     *
     * @param \App\Models\Deduction $model
     *
     * @return array
     */
    public function transform(Deduction $model)
    {
        return [
            'id'         => (int)$model->id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
