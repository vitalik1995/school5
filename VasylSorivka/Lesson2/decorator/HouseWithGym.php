<?php


class HouseWithGym implements  House
{
    protected $house;

    public function __construct($house)
    {
        $this->house = $house;
    }

    public function getCost()
    {
        return $this->house->getCost() + 10000;
    }

    public function getSize()
    {
        return $this->house->getSize() + 150;
    }

    public function getDescription()
    {
        return $this->house->getDescription() . ' with gym';
    }
}