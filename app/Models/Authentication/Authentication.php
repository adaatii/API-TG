<?php

namespace App\Models\Authentication;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;  // Importe o facade JWTAuth

class Authentication extends Model
{
    public function login($credentials)
    {
        // Verifique se as credenciais correspondem a um funcionário
        $employee = Employee::where('email', $credentials['email'])->first();

        if (!$employee) {
            // Se não encontrou um funcionário com o email fornecido, retorne uma mensagem de erro
            return response()->json(['message' => 'Login failed'], 401);
        }

        // Se encontrou um funcionário com o email fornecido, verifique se a senha está correta
        if (Hash::check($credentials['password'], $employee->password)) {
            // Se a senha está correta, faça o login do funcionário e gere o token JWT
            $token = JWTAuth::fromUser($employee);
            return $token;
        } else {
            // Se a senha está incorreta, retorne uma mensagem de erro
            return false;
        }
    }
}
