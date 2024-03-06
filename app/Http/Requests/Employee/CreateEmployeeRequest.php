<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'cpf' => [
                'required',
                'string',
                'unique:employees',
            ],
            'email' => [
                'required',
                'email',
                'unique:employees',
            ],
            'password' => [
                'required',
                'string',
                'min:8'
            ],
            'status' => [
                'required',
                'boolean',
            ]
        ];
    }
}
