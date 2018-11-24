<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Food;

/**
 * Class FoodTransformer.
 *
 * @package namespace App\Transformers;
 */
class FoodTransformer extends TransformerAbstract
{
    /**
     * Transform the Food entity.
     *
     * @param \App\Models\Food $model
     *
     * @return array
     */
    public function transform(Food $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
