<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'string|required|max:256',
            'content' => 'string|required|min:20',
            'is_active' => 'sometimes|in:on,off',
            'category_id' => 'integer|required',
            'thumbnail' => 'required|image'
        ];
    }
}
