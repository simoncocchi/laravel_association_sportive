<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipCreateRequest extends FormRequest
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
            'payment_type' => ['string', 'max:255', 'bail'],
            'price' => ['regex:/^\d+(\.\d{1,2})?$/', 'required', 'bail'],
            'date_start' => ['bail', 'date_format', 'required'],
            'date_end' => ['bail', 'date_format:', 'required']
        ];
    }
}
