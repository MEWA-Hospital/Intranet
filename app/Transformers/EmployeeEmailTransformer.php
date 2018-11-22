<?php

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
