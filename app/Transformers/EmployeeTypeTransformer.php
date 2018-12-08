<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\EmployeeType;

/**
 * Class EmployeeTypeTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeeTypeTransformer extends TransformerAbstract
{
    /**
     * Transform the EmployeeType entity.
     *
     * @param \App\Models\EmployeeType $model
     *
     * @return array
     */
    public function transform(EmployeeType $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
