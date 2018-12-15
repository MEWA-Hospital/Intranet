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
            'username'  => 'required|max:50', Rule::unique('users')->ignore($this->id, 'id'),
            'email'     => 'nullable|email|max:255,', Rule::unique('users')->ignore($this->id, 'id'),
            'telephone' => 'nullable|numeric|,', Rule::unique('users')->ignore($this->id, 'id'),
        ];
    }
}
