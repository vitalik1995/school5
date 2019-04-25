<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "Sedan.php";
require_once "ChromeWheels.php";
require_once "TapeRecorder.php";
require_once "RoofBox.php";

$newSedan = new Sedan();
echo $newSedan->getDescription();
echo $newSedan->getCost();
echo "<br>";
echo "<hr>";
$sedanWithRoofBox = new RoofBox($newSedan);
echo $sedanWithRoofBox->getDescription();
echo $sedanWithRoofBox->getCost();
echo "<br>";
echo "<hr>";
$sedanWithChromeWheels = new ChromeWheels($sedanWithRoofBox);
echo $sedanWithChromeWheels->getDescription();
echo $sedanWithChromeWheels->getCost();
echo "<br>";
echo "<hr>";
$sedanWithTapeRecorder = new TapeRecorder($sedanWithChromeWheels);
echo $sedanWithTapeRecorder->getDescription();
echo $sedanWithTapeRecorder->getCost();
