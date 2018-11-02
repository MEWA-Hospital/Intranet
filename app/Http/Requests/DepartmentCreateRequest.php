<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentCreateRequest extends FormRequest
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
            'name'         => 'required|string|max:255',
            'mailing_list' => 'nullable|email|max:255',
            'email'        => 'nullable|email|max:255',
//            'branch_id'    => 'required|numeric',
//            'token'        => 'required|max:24',
//            'slug'         => 'required|max:255'
        ];
    }
}
