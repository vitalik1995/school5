<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "Configuration.php";
require_once "User.php";

$config = new Configuration(90,"Black");

$User = new User("Igor", $config);

echo "{$User->getName()} listen music on {$User->getConfiguration()->getVolumeLevel()} 
volume level and prefers {$User->getConfiguration()->getColorOfTheme()} theme of application";
