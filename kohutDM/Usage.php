<?php


namespace school5\kohutDM\SimpleFactory;

use school5\kohutDM\Pool\Pool;

define('ROOT',dirname(__FILE__));

require (ROOT . '/SimpleFactory.php');
require (ROOT . '/FightUnit.php');
require (ROOT . '/Pool.php');
require (ROOT . '/CastleGuard.php');

/**
 * Simple Factory realization
 */
echo "----------SIMPLE FACTORY----------<br/><br/>";
$simpleFactory = new SimpleFactory();
$myUnit = $simpleFactory->makeFightUnit();
echo $myUnit->fight() . "<br/><br/>";
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
echo "----------------------------------";