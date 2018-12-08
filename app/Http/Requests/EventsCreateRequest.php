<?php

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
            'name'       => 'required|string|max:255',
            'body'       => 'required',
            'venue'      => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date'
        ];
    }
}
