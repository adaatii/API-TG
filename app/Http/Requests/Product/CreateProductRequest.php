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
}
