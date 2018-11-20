<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\EmployeeTelephone;

/**
 * Class EmployeeTelephoneTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeeTelephoneTransformer extends TransformerAbstract
{
    /**
     * Transform the EmployeeTelephone entity.
     *
     * @param \App\Models\EmployeeTelephone $model
     *
     * @return array
     */
    public function transform(EmployeeTelephone $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
