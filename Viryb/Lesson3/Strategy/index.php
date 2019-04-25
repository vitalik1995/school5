<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once "CouponGenerator.php";
require_once "BmwCouponGenerator.php";
require_once "MercedesCouponGenerator.php";
require_once "CarFactory.php";
$carFactory = new CarFactory();
$carBmw = $carFactory->couponObjectGenerator('bmw');

$couponGeneratorObj = new CouponGenerator($carBmw);
echo $couponGeneratorObj->getCoupon();

echo "<br>";
echo "<hr>";
$carMercedes = $carFactory->couponObjectGenerator('mercedes');
$newMCoupon = new CouponGenerator($carMercedes);
echo $newMCoupon->getCoupon();
