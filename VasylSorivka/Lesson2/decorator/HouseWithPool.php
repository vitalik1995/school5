<?php

class HouseWithPool implements House
{
    protected $house;

    public function __construct($house)
    {
        $this->house = $house;
    }

    public function getCost()
    {
        return $this->house->getCost() + 20000;
    }

    public function getSize()
    {
       return $this->house->getSize() + 100;
    }

    public function getDescription()
    {
        return $this->house->getDescription() . ' with pool';
    }
}

