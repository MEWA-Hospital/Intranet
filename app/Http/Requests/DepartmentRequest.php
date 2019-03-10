<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Requests;


class DepartmentRequest extends Request
{
    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'mailing_list' => 'nullable|email|max:255',
            'email'        => 'nullable|email|max:255',
        ];
    }
}
