<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\DTO;


use App\Http\Requests\NewsRequest;
use Spatie\DataTransferObject\DataTransferObject;

class NewsData extends DataTransferObject
{
    /* @var string */
    public $title;

    /* @var string */
    public $body;

    /* @var integer */
    public $user_id;

    public static function fromRequest(NewsRequest $eventRequest): self
    {
        return new self([
            'title'    => $eventRequest->get('title'),
            'body'    => $eventRequest->get('body'),
            'user_id' => auth()->user()->id ?: null,
        ]);
    }
}
