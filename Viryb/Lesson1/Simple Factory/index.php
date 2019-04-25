<?php

require_once 'SimpleFactory.php';

$carFactory = new SimpleFactory();
$newCar1 = $carFactory->makeCar('CargoCar');
echo $newCar1->getInfo();
$newCar2 = $carFactory->makeCar('PassengerCar');
echo $newCar2->getInfo();
