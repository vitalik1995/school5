<?php

// Пул об'єктів створений для економії часу нв створення нових об'єктів , тому всі об'єкти створюються в один момент
// і вони витягуються з масиву об'єктів для використання


error_reporting(E_ALL);
ini_set('display_errors', 1);

class RentCarsOffice{

    /**
     * @var array
     */
    private $free_cars = [];

    /**
     * @var array
     */
    private $in_use_cars = [];

    /**
     * @return Car|mixed
     */
    public function getCar(){

        if(count($this->free_cars) == 0)
        {
            $car = new Car;
        }else{
            $car = array_shift($this->free_cars);
        }
        $this->in_use_cars[spl_object_hash($car)] = $car;
        return $car;
    }

    /**
     * @param object $car
     * @return mixed
     */
    public function returnCar(object $car){

        if(isset($this->in_use_cars[spl_object_hash($car)])){
            $car->returnDate(date("M-d-y"));

            unset($this->in_use_cars[spl_object_hash($car)]);
            $this->free_cars[spl_object_hash($car)] = $car;
        }
        return $car->payPerHour();
    }

    /**
     * @return array
     */
    public function showFreeCars(){

        return $this->free_cars;
    }

    /**
     * @return array
     */
    public function showUsedCars(){

        return $this->in_use_cars;
    }
}

class Car{

    /**
     * @var false|string
     */
    private $startDate;

    /**
     * @var
     */
    private $returnDate;

    /**
     * Car constructor.
     */
    public function __construct()
    {

        $this->startDate = date("M-d-y");
    }

    /**
     * @param string $date
     */
    public function returnDate(string $date)
    {
        $this->returnDate = $date;
    }

    /**
     * @return float|int
     */
    public function payPerHour()
    {
        $days = (strtotime($this->returnDate) - strtotime($this->startDate)) / (60 * 60 * 24);
        return $days;
    }
}


//Test 1 - with empty arrays;
$Office = new RentCarsOffice();
$Ford = $Office->getCar();
$Office->returnCar($Ford);

//$Mercides = $Office->getCar();

var_dump($Office->showFreeCars())





?>