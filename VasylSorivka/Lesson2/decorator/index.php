<?php

require_once 'House.php';
require_once 'StandartHouse.php';
require_once 'HouseWithGym.php';
require_once 'HouseWithPool.php';

$standartHouse = new StandartHouse();
$standartHouse = new HouseWithPool($standartHouse);
echo $standartHouse->getCost() . '<\n>';
echo $standartHouse->getSize() . '<\n>';
echo $standartHouse->getDescription() . '<\n>';

$standartHouse = new HouseWithGym($standartHouse);
echo $standartHouse->getCost() . '<\n>';
echo $standartHouse->getSize() . '<\n>';
echo $standartHouse->getDescription() . '<\n>';

