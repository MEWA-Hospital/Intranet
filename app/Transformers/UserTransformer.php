<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
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
            'id'                       => (int)$model->id,
            'department_id'            => (int)$model->department_id,
            'group_id'                 => (int)$model->group_id,
            'username'               => (string)$model->username,
            'email'                    => (string)$model->email,
            'telephone'                => (string)$model->telephone,
            'changed_default_password' => (boolean)$model->changed_default_password,
            'slug'                     => $model->slug,
            'created_at'               => $model->created_at,
            'updated_at'               => $model->updated_at,
            'deleted_at'               => $model->deleted_at,
        ];
    }
}
