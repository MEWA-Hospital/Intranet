<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Extension;

/**
 * Class ExtensionTransformer.
 *
 * @package namespace App\Transformers;
 */
class ExtensionTransformer extends TransformerAbstract
{
    /**
     * Transform the Extension entity.
     *
     * @param \App\Models\Extension $model
     *
     * @return array
     */
    public function transform(Extension $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
