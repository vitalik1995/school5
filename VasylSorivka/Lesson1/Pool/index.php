<?php

require_once 'Factory.php';
require_once 'Auto.php';

Factory::pushAuto(new Auto('ford'));
Factory::pushAuto(new Auto('fiat'));

echo Factory::getAuto('ford')->getModels() . "\n";
echo Factory::getAuto('fiat')->getModels() . "\n";

