<?php


namespace App\Model;


class Order
{
    private int $score;
    private bool $isCompleted;
    private Ingredients $ingredients;

    /**
     * Order constructor.
     * @param int $score
     * @param bool $isCompleted
     * @param Ingredients $ingredients
     */
    public function __construct(int $score, bool $isCompleted, Ingredients $ingredients)
    {
        $this->score = $score;
        $this->isCompleted = $isCompleted;
        $this->ingredients = $ingredients;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }

    public function getIngredients(): Ingredients
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient):void
    {
        $this->ingredients[] = $ingredient;
    }

}
