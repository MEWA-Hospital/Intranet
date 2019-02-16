<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Transformers;

use App\Models\Document;
use League\Fractal\TransformerAbstract;

/**
 * Class DocumentTransformer.
 *
 * @package namespace App\Transformers;
 */
class DocumentTransformer extends TransformerAbstract
{
    /**
     * Transform the Document entity.
     *
     * @param \App\Models\Document $model
     *
     * @return array
     */
    public function transform(Document $model)
    {
        return [
            'id'          => (int)$model->id,
            'user_id'     => (int)$model->user_id,
            'uuid'        => $model->uuid,
            'name'        => $model->name,
            'description' => $model->description,
            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at
        ];
    }
}
