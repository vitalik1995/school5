<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarModification.php";

class RoofBox extends CarModification
{
    const ROOF_BOX_PRICE = 660;
    const NAME_OF_OPTION = " Roof Box ";

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->car->getCost() + self::ROOF_BOX_PRICE;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->car->getDescription(). self::NAME_OF_OPTION;
    }
}
