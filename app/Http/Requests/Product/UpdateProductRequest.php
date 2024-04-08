<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                'exists:products'
            ],
            'description' => [
                'string',
                'unique:products',
                'max:255'
            ],
            'price' => [
                'numeric',
            ],
            'status' => [
                'boolean'
            ],
            'category_id' => [
                'integer',
                'exists:categories,id'
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
            'price.numeric' => 'The price must be a number.',
            'status.boolean' => 'The status field must be true or false.',
            'category_id.integer' => 'The category id must be an integer.',
            'category_id.exists' => 'The selected category id is invalid.'
        ];
    }
}
