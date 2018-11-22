<?php

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
