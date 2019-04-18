<?php
/**
 * StaticFactory
 *
 * @category school5
 * @package StaticFactory
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/StaticFactory/AllDyllers/ElectrictDyller.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/StaticFactory/AllDyllers/GasDyller.php";

/**
 * Class StaticDyller
 * @package school5\StaticFactory\AllDyllers
 */
class StaticDyller
{
    /**
     * main method for static Factory
     *
     * @param $type
     * @return ElectrictDyller|GasDyller
     */
    public static function chooseFuel($type)
    {
        if($type == 'electric')
        {
            return new ElectrictDyller();
        }
        if($type == 'gas')
        {
            return new GasDyller();
        }
        else {
            echo "wrong type of fuel";
        }
    }
}