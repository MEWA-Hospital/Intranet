<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->can('update-employees');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required|string|min:3|max:255',
            'gender'           => 'required|string|max:6',
            'department_id'    => 'required|numeric',
            'designation'      => 'required|string|max:150',
            'dob'              => 'required|date',
            'date_employed'    => 'required|date|after:dob',
            'employee_type_id' => 'required|numeric',
            'physical_address' => 'nullable|string|max:255',
            'national_id_no'   => 'required|string|max:20',
            'nhif_no'          => 'nullable|string|max:50',
            'nssf_no'          => 'nullable|string|max:50',
            'kra_pin'          => 'nullable|string|max:50',
            'biometric_code'   => 'nullable|numeric'
        ];
    }
}
