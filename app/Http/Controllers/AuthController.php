<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    /**
     * __construct
     *
     * @param  mixed $authService
     * @return void
     */
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    /**
     * Handle login request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $data = $request->only(["email","password","remember"]);
        $response = $this->authService->login($data);

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data' => $response['data'] ?? null,
        ], $response['code']);
    }
}
