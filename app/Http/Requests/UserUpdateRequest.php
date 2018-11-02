<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'username'      => 'required|max:255',Rule::unique('users')->ignore($this->id, 'id'),
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'nullable|max:255|email|,', Rule::unique('users')->ignore($this->id, 'id'),
            'telephone'     => 'nullable|numeric|,', Rule::unique('users')->ignore($this->id, 'id'),
            'department_id' => 'required|numeric',
            'group_id'      => 'nullable|numeric',
            'designation'   => 'nullable|string|max:255',
        ];
    }
}
