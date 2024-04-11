<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
                'exists:employees'
            ],
            'name' => [
                'string'
            ],
            'cpf' => [
                'string',
                Rule::unique('employees')->ignore(request()->id),
            ],
            'email' => [
                'email',
                Rule::unique('employees')->ignore(request()->id),
            ],
            'password' => [
                'string',
                'min:8'
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
            'name.string' => 'The name must be a string.',
            'cpf.string' => 'The CPF must be a string.',
            'cpf.unique' => 'The CPF has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'status.boolean' => 'The status field must be true or false.'
        ];
    }
}
