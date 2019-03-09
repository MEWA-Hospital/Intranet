<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\ViewModels;


use Domain\Employee\Models\Bank;
use Spatie\ViewModels\ViewModel;

class BankViewModel extends ViewModel
{
    /** @var \Domain\Employee\Models\Bank */
    public $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }
}
