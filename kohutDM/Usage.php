<?php


namespace school5\kohutDM\SimpleFactory;

define('ROOT',dirname(__FILE__));

require (ROOT . '/SimpleFactory.php');
require (ROOT . '/FightUnit.php');

$simpleFactory = new SimpleFactory();
$myUnit = $simpleFactory->makeFightUnit();
echo $myUnit->fight();