<?php

namespace App\Model;

use JetBrains\PhpStorm\Pure;

class Cell
{
    private Coordinates $coordinates;
    private Ingredient $ingredient;
    private bool $hasRobot;

    /**
     * Cell constructor.
     */
    #[Pure] public function __construct(Coordinates $coordinates, Ingredient $ingredient, bool $hasRobot)
    {
    $this->coordinates = $coordinates;
    $this->ingredient = $ingredient;
    $this->hasRobot = $hasRobot;
    }

    #[Pure] public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    #[Pure] public function getIngredient(): Ingredient
    {
        return $this->ingredient;
    }

    #[Pure] public function hasRobot(): bool
    {
        return $this->hasRobot;
    }

    public function addRobot(): void
    {
        $this->hasRobot = true;
    }

    public function removeRobot(): void
    {
        $this->hasRobot = false;
    }


}
