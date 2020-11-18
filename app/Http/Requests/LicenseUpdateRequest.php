<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseUpdateRequest extends FormRequest
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
            'price' => ['regex:/^\d+(\.\d{1,2})?$/', 'required', 'bail'],
            'duration' => ['integer', 'required', 'bail'],
            'duration_type' => ['required', 'bail', 'string', ],
            'month_start' => ['date_format', 'required', 'bail'],
            'day_start' => ['date_format', 'required', 'bail'],
        ];
    }
}
