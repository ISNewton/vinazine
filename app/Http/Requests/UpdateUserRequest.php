<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'bio' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|confirmed|min:8',
            'is_blocked' => 'sometimes|in:on,off',
            'avatar' => 'nullable|image',
            'user_type' => 'nullable'
        ];
    }
}
