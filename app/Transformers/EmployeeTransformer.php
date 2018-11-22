<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Employee;

/**
 * Class EmployeeTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeeTransformer extends TransformerAbstract
{
    /**
     * Transform the Employee entity.
     *
     * @param \App\Models\Employee $model
     *
     * @return array
     */
    public function transform(Employee $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
