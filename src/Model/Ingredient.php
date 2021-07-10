<?php

namespace App\Model;

class Ingredient
{
    private int $score;
    private string $name;

    /**
     * Ingredient constructor.
     */
    public function __construct(int $score, string $name)
    {
        $this->score = $score;
        $this->name = $name;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getName(): string
    {
        return $this->name;
    }


}
