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
            'id.integer' => 'The id must be an integer.',
            'id.exists' => 'The selected id is invalid.',
        ];
    }
}
