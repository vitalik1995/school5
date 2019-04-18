<?php


class StandartHouse implements House
{
    public function getCost()
    {
        return 50000;
    }

    public function getSize()
    {
        return 200;
    }

    public function getDescription()
    {
        return 'Standart house';
    }
}