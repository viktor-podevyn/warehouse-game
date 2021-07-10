<?php

namespace App\Model;

class Grid
{
    /**
     * @var Cell[]
     */
    private array $cells;

    /**
     * Grid constructor.
     */
    public function __construct()
    {
        $this->cells = [];
    }

    public function getCells(): array
    {
        return $this->cells;
    }

    public function addCell(Cell $cell):void
    {
        $this->cells[] = $cell;
    }
}
