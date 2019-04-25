<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.10.17
 * Time: 11:07
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "DateInAmericanFormat.php";
require_once "AdapterClass.php";
require_once "DateInEuroFormat.php";
require_once "DisplayingDateInEuropeanFormat.php";

$date = new DateInEuroFormat();
$dateAdapter = new EuroAdapterClass($date);
echo $dateAdapter->displayDateAmerican();
echo "<br>";
$dateInAmerican = new DateInAmericanFormat();
echo $dateInAmerican->displayDateAmerican();
