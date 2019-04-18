<?php

require_once 'Registry.php';

Registry::setData('name', 'ford');
Registry::setData('color', 'white');
Registry::removeData('color');
echo Registry::getData('name');
//echo Registry::getData('color');