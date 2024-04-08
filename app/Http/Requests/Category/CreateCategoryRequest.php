<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'description' => [
                'required',
                'string',
                'unique:categories',
                'max:255'
            ],
            'status' => [
                'required',
                'boolean'
            ]
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.unique' => 'The description has already been taken.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.required' => 'The status field is required.',
            'status.boolean' => 'The status field must be true or false.'
        ];
    }
}
