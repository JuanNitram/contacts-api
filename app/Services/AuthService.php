<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
  /**
   * @param string $email
   * @param string $password
   * @return boolean
   */
  public function attempt(string $email, string $password): bool
  {
    return Auth::attempt(['email' => $email, 'password' => $password]);
  }

  /**
   * @return User
   */
  public function user(): User
  {
    return Auth::user();
  }
}