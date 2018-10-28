<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

/**
 * Class DepartmentTransformer.
 *
 * @package namespace App\Transformers;
 */
class DepartmentTransformer extends TransformerAbstract
{
    /**
     * Transform the Department entity.
     *
     * @param \App\Models\Department $model
     *
     * @return array
     */
    public function transform(Department $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
