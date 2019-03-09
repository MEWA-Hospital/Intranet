<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\User\DTO;


use App\Http\Requests\CommentRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CommentData extends DataTransferObject
{
    /** @var integer */
    public $user_id;

    /** @var integer */
    public $commentable_id;

    /** @var string */
    public $body;

//    public $commentable_type;

    public static function fromRequest(CommentRequest $request): self
    {
        return new self([
            'user_id'        => $request->get('user_id'),
            'commentable_id' => $request->get('commentable_id'),
            'body'           => $request->get('body'),
        ]);
    }
}
