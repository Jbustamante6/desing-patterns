<?php

namespace App\Factories\Classes;

use App\Factories\Interfaces\RestaurantInterface;

abstract class BaseRestaurant implements RestaurantInterface
{
  protected $nextRestaurant;

  public function setNext(RestaurantInterface $next)
  {
    $this->nextRestaurant = $next;
    return $next;
  }

  public function handleOrder($order)
  {
    if ($this->canHandle($order)) {
      return "Order handled by " . get_class($this);
    } elseif ($this->nextRestaurant) {
      return $this->nextRestaurant->handleOrder($order);
    } else {
      return "Sorry, we can't handle this order.";
    }
  }

  abstract public function canHandle($order);
}
