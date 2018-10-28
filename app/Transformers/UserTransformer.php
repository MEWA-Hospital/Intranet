<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int)$model->id,
            'first_name' => $model->first_name,
            'last_name'  => $model->last_name,
            'full_name'  => $model->first_name . ' ' . $model->last_name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
