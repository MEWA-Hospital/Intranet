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

class EventsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->can('create-events');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'body'          => 'required',
            'venue'         => 'required|string|max:255',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after:start_date',
            'department_id' => 'required'
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
            'start_date'    => 'Start Date',
            'end_date'      => 'End Date',
            'department_id' => 'Department',
            'body'          => 'Description'
        ];
    }
}
