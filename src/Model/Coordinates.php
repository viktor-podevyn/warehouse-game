<?php


namespace App\Model;


class Coordinates
{
private int $x;
private int $y;

    /**
     * Coordinates constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getCoordinates(): string
    {
        return $this->x." ".$this->y;
    }


}
