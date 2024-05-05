<?php
namespace App\Factories\Classes;
use App\Factories\Classes\BaseRestaurant;

class SushiRestaurant extends BaseRestaurant
{
    public function canHandle($order)
    {
        return $order['type'] === 'sushi';
    }
}