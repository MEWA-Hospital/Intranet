<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Events;

/**
 * Class EventsTransformer.
 *
 * @package namespace App\Transformers;
 */
class EventsTransformer extends TransformerAbstract
{
    /**
     * Transform the Events entity.
     *
     * @param \App\Models\Events $model
     *
     * @return array
     */
    public function transform(Events $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
