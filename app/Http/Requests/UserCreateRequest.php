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
            'username'           => 'required|string|max:20|unique:users',
            'email'              => 'required|email|unique:users|regex:/^[A-Za-z0-9\.]*@(mewa)[.](or)[.](ke)$/',
            'telephone'          => 'nullable|numeric|unique:users|size:10',
        ];
    }
}
