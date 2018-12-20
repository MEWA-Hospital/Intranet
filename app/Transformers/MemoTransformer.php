<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Memo;

/**
 * Class MemoTransformer.
 *
 * @package namespace App\Transformers;
 */
class MemoTransformer extends TransformerAbstract
{
    /**
     * Transform the Memo entity.
     *
     * @param \App\Models\Memo $model
     *
     * @return array
     */
    public function transform(Memo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
