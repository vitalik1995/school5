<?php

use school5\kohutDM\SimpleFactory;
use school5\kohutDM\Pool;
use school5\kohutDM\Singleton;
use school5\kohutDM\StaticFactory;

define('ROOT',dirname(__FILE__));

require (ROOT . '/SimpleFactory.php');
require (ROOT . '/FightUnit.php');
require (ROOT . '/Pool.php');
require (ROOT . '/CastleGuard.php');
require (ROOT . '/Singleton.php');
require (ROOT . '/StaticFactory.php');

/**
 * Simple Factory realization
 */
echo "----------SIMPLE FACTORY----------<br/><br/>";
$simpleFactory = new SimpleFactory();
$myUnit = $simpleFactory->makeFightUnit();
echo $myUnit->fight() . "<br/><br/>";
echo "--------------------------------------------------<br/><br/>";

/**
 * Static Factory realization
 */
echo "----------STATIC FACTORY----------<br/><br/>";
$unit =  StaticFactory::factory('FightUnit');
echo $unit->fight() . "<br/>";
$unit =  StaticFactory::factory('CastleGuard');
echo $unit->kingDefence() . "<br/>";
$unit =  StaticFactory::factory('Cannon');
echo "<br/><br/>";
echo "--------------------------------------------------";


/**
 * Pool realization
 */
echo "<br/><br/><br/>";
echo "--------------POOL----------------<br/><br/>";
$pool = new Pool();
$firstGuard = $pool->getCastleGuard();
echo 'First guard: "' . $firstGuard->kingDefence() . '"' . "<br/>";

echo "OccupiedCastleGuard ";
var_dump($pool->getOccupiedCastleGuard());
echo "<br/>";

echo "FreeCastleGuard ";
var_dump($pool->getFreeCastleGuard());
echo "<br/><br/>";

$secondGuard = $pool->getCastleGuard();
echo 'Second guard: "Run! ' . $secondGuard->kingDefence() . '"' . "<br/>";

echo "OccupiedCastleGuard ";
var_dump($pool->getOccupiedCastleGuard());
echo "<br/>";

echo "FreeCastleGuard ";
var_dump($pool->getFreeCastleGuard());
echo "<br/><br/>";

echo "All is fine! Relax! <br/>";
$pool->disposeCastleGuard($firstGuard);
$pool->disposeCastleGuard($secondGuard);

echo "OccupiedCastleGuard ";
var_dump($pool->getOccupiedCastleGuard());
echo "<br/>";

echo "FreeCastleGuard ";
var_dump($pool->getFreeCastleGuard());
echo "<br/><br/>";

$newGuard = $pool->getCastleGuard();
echo 'New guard: "First guard sleeps. A`m second guard! ' . $newGuard->kingDefence() . '"' . "<br/>";

echo "OccupiedCastleGuard ";
var_dump($pool->getOccupiedCastleGuard());
echo "<br/>";

echo "FreeCastleGuard ";
var_dump($pool->getFreeCastleGuard());
echo "<br/><br/>";

echo "There are " . $pool->countCastleGuard() . " guardians in the castle<br/><br/>";
echo "----------------------------------<br/><br/>";

/**
 * Singleton realization
 */
echo "----------SINGLETON---------<br/><br/>";
$key = Singleton::getInstance();
echo $key->getCastleKey('Sim Sim open up!');
echo "<br/>";
var_dump($key);
echo "<br/><br/>--------------------------------------------------";
