<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/13/19
 * Time: 16:48
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/API/ConcertInterface.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/Classes/VipPlaceTernopil.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/Classes/TernopilHall.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/Classes/ExtraSpaceTernopil.php";



$ternopil = new TernopilHall();
$extraTernopil = new ExtraSpaceTernopil($ternopil);
$vipPlace = new VipPlaceTernopil($extraTernopil);
var_dump($vipPlace->totalMoney());
