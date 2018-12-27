<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsUpdateRequest extends FormRequest
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
