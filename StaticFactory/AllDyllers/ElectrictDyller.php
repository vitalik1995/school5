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
 * Class ElectrictDyller
 * @package school5\StaticFactory\AllDyllers
 */
class ElectrictDyller implements DyllerInterface
{
    /**
     * sell gas car
     *
     * @return string
     */
    public function sellCar()
    {
        $electricCar = "client bought electric car";
        return $electricCar;
    }
}