<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\DTO;


use App\Http\Requests\BankBranchRequest;
use Spatie\DataTransferObject\DataTransferObject;

class BankBranchData extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var int */
    public $bank_id;

    public static function fromRequest(BankBranchRequest $request): self
    {
        return new self([
            'name'    => $request->get('name'),
            'bank_id' => $request->get('bank_id'),
        ]);
    }
}
