<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\ViewModels;


use Domain\Employee\Models\BankBranch;
use Spatie\ViewModels\ViewModel;

class BankBranchViewModel extends ViewModel
{
    /** @var \Domain\Employee\Models\BankBranch */
    public $branch;

    public function __construct(BankBranch $branch)
    {
        $this->branch = $branch;
    }
}
