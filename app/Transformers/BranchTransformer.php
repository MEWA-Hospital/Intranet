<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Branch;

/**
 * Class BranchTransformer.
 *
 * @package namespace App\Transformers;
 */
class BranchTransformer extends TransformerAbstract
{
    /**
     * Transform the Branch entity.
     *
     * @param \App\Models\Branch $model
     *
     * @return array
     */
    public function transform(Branch $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
