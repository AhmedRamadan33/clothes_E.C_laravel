<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'between:2,25',
                // Rule::unique('categories')->ignore($this->Categories),
            ],
            'photo' => [
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'parent_id' => [
                'nullable',
                'exists:categories,id',
            ],
        ];
    }
}
