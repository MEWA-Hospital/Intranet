<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 5:22 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

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
