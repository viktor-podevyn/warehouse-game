<?php

namespace App\Model;

class Robot
{
    private Coordinates $coordinates;
    private Ingredients $ingredients;

    /**
     * Robot constructor.
     * @param Coordinates $coordinates
     * @param Ingredients $ingredients
     */
    public function __construct(Coordinates $coordinates, Ingredients $ingredients)
    {
        $this->coordinates = $coordinates;
        $this->ingredients = $ingredients;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function getIngredients(): Ingredients
    {
        return $this->ingredients;
    }


}
