<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
                'required',
                'integer',
                'exists:categories'
            ],
            'description' => [
                'string',
                'unique:categories',
                'max:255'
            ],
            'status' => [
                'boolean'
            ]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    public function messages()
    {
        return [
            'id.required' => 'The id field is required.',
            'id.integer' => 'The id must be an integer.',
            'id.exists' => 'The selected id is invalid.',
            'description.string' => 'The description must be a string.',
            'description.unique' => 'The description has already been taken.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.boolean' => 'The status field must be true or false.'
        ];
    }
}
