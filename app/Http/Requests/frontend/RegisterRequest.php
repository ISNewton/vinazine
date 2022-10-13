<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:2,20',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|string|confirmed|between:8,50',
            'g-recaptcha-response' => 'required|captcha'
        ];

    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'The captcha is required',
            'g-recaptcha-response.captcha' => 'The captcha is required',
        ];
    }
}
