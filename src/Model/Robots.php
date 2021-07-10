<?php

namespace App\Model;

class Robots
{
    /**
     * @var Robot[]
     */
    private array $robots;

    /**
     * Robots constructor.
     */
    public function __construct()
    {
        $this->robots = [];
    }

    /**
     * @return Robot[]
     */
    public function getRobots(): array
    {
        return $this->robots;
    }

    public function addRobot(Robot $robot):void
    {
        $this->robots[]=$robot;
    }
}
