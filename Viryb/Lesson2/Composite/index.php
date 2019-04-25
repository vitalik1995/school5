<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "Category.php";
$cars = new Category();
$cars->setName("Cars");
$carAudi = new Category();
$carAudi->setName("Audi");
$carMazda = new Category();
$carMazda->setName("Mazda");
$carVW = new Category();
$carVW->setName("VW");

$cars->addChild($carAudi);
$cars->addChild($carMazda);
$cars->addChild($carVW);

$cargo = new Category();
$cargo->setName("Cargo");

$cargoDaf = new Category();
$cargoDaf->setName("Daf");
$cargoRenault = new Category();
$cargoRenault->setName("Renault");
$cargoZil = new Category();
$cargoZil->setName("ZIL");

$cargo->addChild($cargoDaf);
$cargo->addChild($cargoRenault);
$cargo->addChild($cargoZil);

$allCar = new Category();
$allCar->setName("AUTO");

$allCar->addChild($cars);
$allCar->addChild($cargo);

echo $allCar->wrapping();
echo "<hr>";
//echo $cars->getTree();
