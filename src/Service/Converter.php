<?php

namespace App\Service;

use App\Model\Coordinates;
use App\Model\Ingredient;
use App\Model\Ingredients;
use App\Model\Order;
use App\Model\Orders;
use App\Model\Robot;
use App\Model\Robots;
use Exception;



class Converter
{

    /**
     * Converter constructor.
     */
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function createIngredient(array $array):Ingredient
    {
        try {
            return new Ingredient($array['score'], $array['name']);
        }catch (Exception)
        {
            throw new Exception("Could not convert array to ingredient");
        }
    }

    /**
     * @throws Exception
     */
    public function arrayToIngredients(array $array):Ingredients
    {
        try {
            $ingredients = new Ingredients();
            foreach ($array as $ingredient)
            {
                $ingredients->addIngredient($this->createIngredient($ingredient));
            }
            return $ingredients;
        }catch (Exception)
        {
            throw new Exception("could not create ingredients");
        }

    }

    /**
     * @throws Exception
     */
    public function arrayToOrders(array $array): Orders
    {
        $orders = new Orders();
        foreach ($array as $order)
        {
            $orders->addOrder($this->createOrder($order));
        }
        return $orders;
    }

    /**
     * @throws Exception
     */
    private function createOrder(array $array):Order
    {
        return new Order(
            $array['score'],
            $array['isCompleted'],
            $this->arrayToIngredients($array['ingredients'])
        );
    }

    /**
     * @throws Exception
     */
    public function arrayToRobots(array $array):Robots
    {
        $robots = new Robots();
        foreach ($array as $robot)
        {
            $robots->addRobot($this->createRobot($robot));
        }
        return $robots;
    }

    /**
     * @throws Exception
     */
    public function createRobot(array $array): Robot
    {
        return new Robot(
            new Coordinates($array['cell']['x'],$array['cell']['y']),
            $this->arrayToIngredients($array['ingredients'])
        );
    }
}
