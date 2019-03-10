<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Requests;


class UserRequest extends Request
{
    public function rules(): array
    {
        $rules = [
            'username'         => 'required|string|max:20|unique:users',
            'email'            => 'required|email|unique:users|regex:/^[A-Za-z0-9\.]*@(mewa)[.](or)[.](ke)$/',
            'telephone'        => 'nullable|numeric|unique:users|size:10',
            'name'             => 'required|string|min:3|max:255',
            'gender'           => 'required|string|max:6',
            'department_id'    => 'required|numeric',
            'designation'      => 'required|string|max:50',
            'dob'              => 'required|date',
            'date_employed'    => 'required|date|after:dob',
            'employee_type_id' => 'required|numeric',
            'physical_address' => 'nullable|string|max:255',
            'national_id_no'   => 'required|string|max:20',
            'nhif_no'          => 'nullable|string|max:50',
            'nssf_no'          => 'nullable|string|max:50',
            'kra_pin'          => 'nullable|string|max:50',
            'biometric_code'   => 'nullable|numeric',

        ];

//        dd($rules['username']);

        if ($this->getMethod() == 'PUT') {
//            $rules['username'] = 'required,max:290, ' . Rule::unique('users')->ignore($this->id, 'id');
//            $rules['email'] = ['required|email|max:255,', Rule::unique('users')->ignore($this->id, 'id')];
//            $rules['telephone'] = ['nullable|numeric', Rule::unique('users')->ignore($this->id, 'id')];
        }
//        dd($rules);

        return $rules;
    }
}
