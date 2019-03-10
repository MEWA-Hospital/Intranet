<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\DTO;

use App\Http\Requests\DepartmentRequest;
use Spatie\DataTransferObject\DataTransferObject;

class DepartmentData extends DataTransferObject
{
    /* @var string */
    public $name;

    /* @var string */
    public $email;

    /* @var string */
    public $mailing_list;

    public static function fromRequest(DepartmentRequest $departmentRequest): self
    {
        return new self([
            'name'         => $departmentRequest->get('name'),
            'email'        => $departmentRequest->get('email') ?: null,
            'mailing_list' => $departmentRequest->get('mailing_list') ?: null,
        ]);
    }

}
