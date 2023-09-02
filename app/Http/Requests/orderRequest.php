<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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

            "name" => 'bail|required|string',
            "email" => 'bail|required|string|email|max:255',
            "phone" => 'bail|required|string|max:11',
            "district_id" => 'bail|required|numeric',
            "upazila_id" => 'bail|required|numeric',
            "address" => 'bail|required|string|max:255',
            "massage" => 'bail|nullable|string'
        ];
    }
}
