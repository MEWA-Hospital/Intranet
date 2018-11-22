<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\BiometricInOutDetails;

/**
 * Class BiometricInOutDetailsTransformer.
 *
 * @package namespace App\Transformers;
 */
class BiometricInOutDetailsTransformer extends TransformerAbstract
{
    /**
     * Transform the BiometricInOutDetails entity.
     *
     * @param \App\Models\BiometricInOutDetails $model
     *
     * @return array
     */
    public function transform(BiometricInOutDetails $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
