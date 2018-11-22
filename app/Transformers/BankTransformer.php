<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Bank;

/**
 * Class BankTransformer.
 *
 * @package namespace App\Transformers;
 */
class BankTransformer extends TransformerAbstract
{
    /**
     * Transform the Bank entity.
     *
     * @param \App\Models\Bank $model
     *
     * @return array
     */
    public function transform(Bank $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
