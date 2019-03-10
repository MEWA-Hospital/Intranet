<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\DTO;


use App\Http\Requests\BankRequest;
use Spatie\DataTransferObject\DataTransferObject;

class BankData extends DataTransferObject
{
    /** @var string */
    public $name;

    public static function fromRequest(BankRequest $request): self
    {
        return new self([
            'name' => $request->get('name'),
        ]);
    }
}
