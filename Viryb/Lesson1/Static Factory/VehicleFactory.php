<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "Car.php";
require_once "Boat.php";
require_once "Plane.php";

final class VehicleFactory
{
    public static function factory($vehicle)
    {
        if ($vehicle == 'Car') {
            return new Car();
        } elseif ($vehicle == 'Plane') {
            return new Plane();
        } elseif ($vehicle == 'Boat') {
            return new Boat();
        } else {
            return 'Undefined vehicle';
        }
    }
}
