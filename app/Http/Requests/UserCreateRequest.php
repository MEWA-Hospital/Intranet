<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'nullable|email|unique:users|max:255',
            'telephone'     => 'nullable|numeric|unique:users',
            'department_id' => 'required|numeric',
            'group_id'      => 'nullable|numeric',
            'designation'   => 'nullable|string|max:255',
        ];
    }
}
