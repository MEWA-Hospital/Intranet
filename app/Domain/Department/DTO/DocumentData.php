<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\DTO;


use App\Http\Requests\DocumentRequest;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\DataTransferObject;

class DocumentData extends DataTransferObject
{
    /* @var string */
    public $uuid;

    /* @var integer */
    public $user_id;

    /* @var string */
    public $name;

    /* @var string */
    public $description;

    /* @var \File */
    public $document;


    public static function fromRequest(DocumentRequest $documentRequest): self
    {
        return new self([
            'uuid'        => Uuid::uuid4(),
            'user_id'     => auth()->user()->id ?: null,
            'name'        => $documentRequest->get('name') ?: null,
            'description' => $documentRequest->get('description') ?: null,
            'document'    => $documentRequest->file('document')
        ]);
    }
}
