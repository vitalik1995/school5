<?php
require_once 'Person.php';

$person = new Person();

var_dump($person);

$person->setName('Ivan')->setAge(25);

var_dump($person);
