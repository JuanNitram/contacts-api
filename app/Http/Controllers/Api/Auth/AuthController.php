<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController 
{
  private $authService;

  /**
   * @param AuthService $authService
   */
  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function login(Request $request): JsonResponse
  {
    try {
      if($this->authService->attempt($request->email, $request->password) === true) {
        $user = $this->authService->user();

        return response()->json([
            'token' => $user->createToken(config('app.key'))->plainTextToken
        ], 200);
      }

      return response()->json([
        'errors' => ['error' => 'Email or password incorrect']
      ], 401);
    } catch (Exception $ex) {
      return response()->json([
        'errors' => ['error' => $ex->getMessage()]
      ], 400);
    }
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function user(Request $request): JsonResponse
  {
    return response()->json([
      'user' => $request->user()
    ], 200);
  }
}