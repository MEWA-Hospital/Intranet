<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\ViewModels;


use Domain\Department\Models\Department;
use Spatie\ViewModels\ViewModel;

class DepartmentViewModel extends ViewModel
{
    /** @var \Domain\Department\Models\Department */
    public $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }
}
