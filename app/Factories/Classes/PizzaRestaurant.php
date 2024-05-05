<?php
namespace App\Factories\Classes;
use App\Factories\Classes\BaseRestaurant;

class PizzaRestaurant extends BaseRestaurant
{
    public function canHandle($order)
    {
        return $order['type'] === 'pizza';
    }
}