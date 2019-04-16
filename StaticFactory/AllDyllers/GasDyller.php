<?php
/**
 * StaticFactory
 *
 * @category school5
 * @package StaticFactory
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/StaticFactory/API/DyllerInterface.php";


/**
 * Class GasDyller
 * @package school5\StaticFactory\AllDyllers
 */
class GasDyller implements DyllerInterface
{
    /**
     * sell electric car
     *
     * @return string
     */
    public function sellCar()
    {
        $gasCar = "client bought gas car";
        return $gasCar;
    }
}