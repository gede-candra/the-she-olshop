<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthService;

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
        $data = $request->only(["username_email","password","remember"]);
        $response = $this->authService->login($data);

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data' => $response['data'] ?? null,
        ], $response['code']);
    }

    /**
     * Handle register request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->only(["name","username","email","password"]);
        $response = $this->authService->register($data);

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data' => $response['data'] ?? null,
        ], $response['code']);
    }

    /**
     * Handle logout request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()    
    {
        $response = $this->authService->logout();

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data' => $response['data'] ?? null,
        ], $response['code']);
    }
}
