<?php

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract;

/**
 * Class CommentTransformer.
 *
 * @package namespace App\Transformers;
 */
class CommentTransformer extends TransformerAbstract
{
    /**
     * Transform the Comment entity.
     *
     * @param \App\Models\Comment $model
     *
     * @return array
     */
    public function transform(Comment $model)
    {
        return [
            'id'               => (int)$model->id,
            'commentable_id'   => (int)$model->commentable_id,
            'user_id'          => (int)$model->user_id,
            'commentable_type' => $model->commentable_type,
            'body'             => $model->body,
            'created_at'       => $model->created_at,
            'updated_at'       => $model->updated_at
        ];
    }
}
