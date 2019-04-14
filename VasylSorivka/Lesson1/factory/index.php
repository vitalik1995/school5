<?php

require_once 'Factory.php';
require_once 'Ford.php';
require_once 'Fiat.php';

$factory = Factory::create('ford');

echo $factory->getName();
echo '<br>';

echo $factory->getColor();
echo '<br>';

echo $factory->getAge();

