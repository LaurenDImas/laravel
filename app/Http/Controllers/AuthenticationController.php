<?php
namespace App\Http\Controllers;

use App\Service\AuthService;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function register(): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(request()->all(), [
           "name" => "required",
           "email" => "required|email|unique:users",
           "password" => "required|min:6",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = $this->authService->register($validator->validated());

        return response()->json([
            "token" => $this->authService->generateToken($user)
        ], 200);
    }

    public function login(): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = $this->authService->authenticationUser($validator->validated());

        if(!$user){
            return response()->json("Email atau password salah", 400);
        }

        return response()->json([
            "token" => $this->authService->generateToken($user)
        ]);
    }
}
