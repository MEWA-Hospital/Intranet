<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ext_no'        => 'required|max:20',
            'department_id' => 'required|numeric',
            'employee_id'   => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */

    public function attributes()
    {
        return [
            'ext_no'         => 'extension number',
            'department_id'  => 'department',
            'contact_person' => 'contact person',
        ];
    }
}
