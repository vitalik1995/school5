<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarModification.php";

class ChromeWheels extends CarModification
{
    const WHEELS_PRICE = 400;
    const NAME_OF_OPTION = " Chrome Wheels ";

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->car->getCost() + self::WHEELS_PRICE;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->car->getDescription(). self::NAME_OF_OPTION;
    }
}
