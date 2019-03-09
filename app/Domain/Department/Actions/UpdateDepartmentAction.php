<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\Actions;


use Domain\Department\DTO\DepartmentData;
use Domain\Department\Models\Department;

class UpdateDepartmentAction
{
    /**
     * @param DepartmentData $departmentData
     * @param $id
     */
    public function __invoke(DepartmentData $departmentData, $id): void
    {
        $department = Department::find($id);

        $department->update([
            'name'         => $departmentData->name,
            'email'        => $departmentData->email,
            'mailing_list' => $departmentData->mailing_list,
        ]);

        $department->save();
    }
}
