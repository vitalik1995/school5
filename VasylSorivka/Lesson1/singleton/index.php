<?php
require_once 'Singleton.php';

$firstClass = Singleton::getInstance();
$secondClass = Singleton::getInstance();

$firstClass->name = 'first';
$secondClass->name = 'second';
echo $secondClass->getName();
echo '<br />';
echo $firstClass->getName();
