<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Transformers;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class NewsTransformer.
 *
 * @package namespace App\Transformers;
 */
class NewsTransformer extends TransformerAbstract
{
    /**
     * Include user & comments relation data by default
     */
    protected $defaultIncludes = ['user', 'comments'];

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
            'id'            => (int)$model->id,
            'department_id' => (int)$model->department_id,
            'user_id'       => (int)$model->user_id,
            'title'         => $model->title,
            'body'          => $model->body,
            'slug'          => $model->slug,
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }

    public function includeUser(User $model)
    {
        if ($model->user) {
            return $this->item($model->user, new UserTransformer());
        } else {
            return null;
        }
    }

    public function includeComments(Comment $model)
    {
        if ($model->comments) {
            return $this->item($model->comments, new CommentTransformer());
        } else {
            return null;
        }
    }
}
