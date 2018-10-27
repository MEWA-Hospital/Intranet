<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Membership;

/**
 * Class MembershipTransformer.
 *
 * @package namespace App\Transformers;
 */
class MembershipTransformer extends TransformerAbstract
{
    /**
     * Transform the Membership entity.
     *
     * @param \App\Models\Membership $model
     *
     * @return array
     */
    public function transform(Membership $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
