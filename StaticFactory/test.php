<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/13/19
 * Time: 16:48
 */
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/StaticFactory/AllDyllers/StaticDyller.php";

$car1 = StaticDyller::chooseFuel('gas');
echo $car1->sellCar()."</br>";

$car2 = StaticDyller::chooseFuel('electric');
echo $car2->sellCar();