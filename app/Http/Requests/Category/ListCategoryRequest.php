<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class ListCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'integer',
                'exists:categories'
            ],
            'description' => [
                'string',
                'max:255'
            ],
            'status' => [
                'boolean'
            ]
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'The id must be an integer.',
            'id.exists' => 'The selected id is invalid.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.boolean' => 'The status field must be true or false.'
        ];
    }
}
