<?php

namespace App\Model;

use JetBrains\PhpStorm\Pure;

class Ingredients
{

    /**
     * @var Ingredient[]
     */
    private array $ingredients;

    /**
     * Ingredients constructor.
     */
    #[Pure] public function __construct()
    {
    $this->ingredients = [];
    }

    /**
     * @return Ingredient[]
     */
    #[Pure] public function getIngredients(): array
    {
        return $this->ingredients;
    }

    #[Pure] public function getIngredientByName(string $name): ?Ingredient
    {
        foreach ($this->ingredients as $ingredient)
        {
            if($ingredient->getName() !== $name)
            {
                continue;
            }
            return $ingredient;
        }
        return null;
    }

    public function addIngredient(Ingredient $ingredient):void
    {
        $this->ingredients[] = $ingredient;
    }

}
