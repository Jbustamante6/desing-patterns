<?php

namespace App\Factories\Interfaces;

interface RestaurantInterface
{
  public function setNext(RestaurantInterface $next);
  public function handleOrder($order);
}
