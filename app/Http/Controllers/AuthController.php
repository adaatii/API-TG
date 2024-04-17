<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\AuthenticationResquest;
use App\Models\Authentication\Authentication;

class AuthController extends Controller
{
    private $auth;

    function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function login(AuthenticationResquest $request)
    {
        $credentials = $request->validated();

        $token = $this->auth->login($credentials);

        if ($token) {
            return response()->json(['message' => 'Login successfully', 'token' => $token], 201);
        } else {
            return response()->json(['message' => 'Email or password invalid'], 400);
        }
    }
}
