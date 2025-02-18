<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserResquest extends FormRequest
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
            'name'      => 'required|string|min:10|max:40',
            'email'     => 'required',
            'password'  => 'required|string|min:8|max:30',
            'type'      => [
                'required',
                Rule::in(['user', 'owner', 'admin']),
            ],
        ];
    }
}
