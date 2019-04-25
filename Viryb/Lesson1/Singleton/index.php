<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "Singleton.php";

$president1 = Singleton::getInstance();
$president2 = Singleton::getInstance();
$president1->setName('Petro');
echo $president2->getName();
echo '<pre>';
print_r($president1);
print_r($president2);
echo '<pre>';