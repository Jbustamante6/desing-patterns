<?php
namespace App\Factories\Classes;

use App\Factories\Classes\BaseRestaurant;

class BurgerRestaurant extends BaseRestaurant
{
    public function canHandle($order)
    {
        return $order['type'] === 'burger';
    }
}