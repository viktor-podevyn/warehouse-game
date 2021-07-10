<?php


namespace App\Model;


class Orders
{

    /**
     * @var Order[]
     */
    private array $orders;

    /**
     * Ingredients constructor.
     */
    public function __construct()
    {
        $this->orders = [];
    }

    /**
     * @return Order[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }


    public function addOrder(Order $order):void
    {
        $this->orders[] = $order;
    }

}
