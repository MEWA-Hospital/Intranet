<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\News;

/**
 * Class NewsTransformer.
 *
 * @package namespace App\Transformers;
 */
class NewsTransformer extends TransformerAbstract
{
    /**
     * Transform the News entity.
     *
     * @param \App\Models\News $model
     *
     * @return array
     */
    public function transform(News $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
