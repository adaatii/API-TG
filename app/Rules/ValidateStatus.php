<?php

namespace App\Rules;

use App\Models\Employee\Employee;
use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class ValidateStatus implements ValidationRule
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $employee = Employee::where('email', $this->email)->first();

        if (!$employee) {
            $fail('Email or password invalid.');
            return;
        }

        if ($employee->status != 1) {
            $fail('Email or password invalid.');
        }
    }
}
