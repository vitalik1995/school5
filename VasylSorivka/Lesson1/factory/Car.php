<?php

abstract class Car 
{
    protected $name;
    protected $color;
    protected $age;

    public function getName() 
    {
        return 'Car - ' . ucfirst($this->name);
    }

    public function getColor() 
    {
        return 'Color - ' . ucfirst($this->color);
    }

    public function getAge() 
    {
        return 'Age - ' . ucfirst($this->age);
    }
}

