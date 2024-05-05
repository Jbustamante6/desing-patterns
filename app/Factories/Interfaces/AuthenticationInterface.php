<?php

namespace App\Factories\Interfaces;

interface AuthenticationInterface
{
  public function login(String $email, String $password);
}
