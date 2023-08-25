<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'coupon_name' => 'bail|required|string|max:255|unique:coupons,coupon_name',
            'discount' => 'bail|required|numeric',
            'mini_pur' => 'bail|required|numeric',
            'ex_date' => 'bail|required|date'

        ];
    }
}
