<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
                'unique:products',
                'max:255'
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'status' => [
                'required',
                'boolean'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
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
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'status.required' => 'The status field is required.',
            'status.boolean' => 'The status field must be true or false.',
            'category_id.required' => 'The category id field is required.',
            'category_id.integer' => 'The category id must be an integer.',
            'category_id.exists' => 'The selected category id is invalid.'
        ];
    }
}
