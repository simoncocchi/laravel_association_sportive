<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'bail', 'string'],
            'email' => ['required', 'unique:users', 'max:255', 'bail', 'email'],
            'firstname' => ['required', 'max:255', 'bail', 'string'],
            'phone' => ['min:8', 'max:12', 'bail', 'string'],
            'address' => ['required','string', 'max:80', 'bail'],
            'addressComp' => ['max:80', 'bail', 'string'],
            'zipcode' => ['required', 'max:5', 'bail', 'string'],
            'city' => ['required', 'max:255', 'bail', 'string'],
            'password' => ['required', 'max:255', 'bail', 'string'],
        ];
    }
}
