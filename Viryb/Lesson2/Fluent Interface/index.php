<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$user = new User();
$user->setFirstName('Vitalii')->setLastName('Rybak')->setBirthDate(1995)->setJob('QA');
echo $user->getInfo();
