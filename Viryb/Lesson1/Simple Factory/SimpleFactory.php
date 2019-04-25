<?php
require_once "Car.php";
class SimpleFactory
{
    private $classes = ['PassengerCar','CargoCar'];
    public function makeCar($string)
    {
        foreach ($this->classes as $class){
            if($class == $string) {
                return new $string;
            }
        }

    }
}