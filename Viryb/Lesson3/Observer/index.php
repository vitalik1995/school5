<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "FootballTeam.php";
require_once "FootballFun.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$team = new FootballTeam("Dinamo");

$fun1 = new FootballFun("Michno");
$fun2 = new FootballFun("Bogdan");

$team->attachObserver($fun1);
$team->attachObserver($fun2);

$team->notify();

