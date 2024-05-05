<?php

namespace App\Factories\Services;

use App\Factories\Interfaces\AuthenticationInterface;
use Carbon\Carbon;

class AuthenticationService implements AuthenticationInterface
{
  public function login(string $email, string $password)
  {
    $credentials = ['email' => $email, 'password' => $password];
    if (!$token = auth()->attempt($credentials)) {
      return response()->json(['error' => 'Mail or password incorrect'], 401);
    }

    return $this->respondWithToken($token);
  }

  protected function respondWithToken($token)
  {
    auth()->setToken($token);
    return [
      'access_token'  => $token,
      'expires_in'    => Carbon::now()->addMinutes(auth()->factory()->getTTL())->format('Y-m-d'),
      'user'          => auth()->user()->only('name', 'email'),
    ];
  }
}
