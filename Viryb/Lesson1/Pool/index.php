<?php


require_once "User.php";
require_once "ObjectPool.php";

$user = new Users();
$user->setFirstName("Vitalii")
    ->setLastName("Rybak")
    ->setJob("QA")
    ->setGender("M");

$pool = new ObjectPool();
$pool->addObjectToPool($user, 'V');

$newUser = $pool->getObject('V');
echo $newUser->getInfo();
