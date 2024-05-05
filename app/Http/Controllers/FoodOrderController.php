<?php

namespace App\Http\Controllers;

use App\Factories\Classes\BurgerRestaurant;
use App\Factories\Classes\PizzaRestaurant;
use App\Factories\Classes\SushiRestaurant;
use App\Http\Requests\Order;


class FoodOrderController extends Controller
{
    public function orderFood(Order $request)
    {
        // Configurar la cadena de restaurantes
        $pizzaRestaurant = new PizzaRestaurant();
        $burgerRestaurant = new BurgerRestaurant();
        $sushiRestaurant = new SushiRestaurant();

        $pizzaRestaurant->setNext($burgerRestaurant)->setNext($sushiRestaurant);

        // Realizar un pedido y pasar por la cadena
        $response = $pizzaRestaurant->handleOrder($request->all());

        return $response;
    }
}
