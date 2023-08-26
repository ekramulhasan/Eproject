<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CusRegisterRequrest extends FormRequest
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

            'name' => 'bail|string|max:255',
            'email' => 'bail|required|email|unique:users,email',
            'phone' => 'bail|required|string|max:11',
            'password' => 'bail|required|confirmed|string|min:4'
            
        ];
    }
}
