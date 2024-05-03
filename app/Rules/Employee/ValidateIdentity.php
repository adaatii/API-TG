<?php

namespace App\Rules\Employee;

use Illuminate\Contracts\Validation\Rule;
use Closure;

class ValidateIdentity implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove qualquer caractere especial ou espaços do CPF
        $cpf = preg_replace('/[^0-9]/', '', $value);

        // Verifique se o CPF possui 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifique se o CPF não é uma sequência de dígitos repetidos
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Valide o CPF usando o algoritmo
        for ($i = 9; $i < 11; $i++) {
            $sum = 0;
            for ($j = 0; $j < $i; $j++) {
                $sum += $cpf[$j] * (($i + 1) - $j);
            }
            $sum = (($sum * 10) % 11) % 10;
            if ($cpf[$i] != $sum) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid CPF.';
    }
}
