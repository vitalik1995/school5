<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarInterface.php";

class Sedan implements CarInterface
{
    /**
     * @return int
     */
    public function getCost()
    {
        return 314000;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "Sedan ";
    }
}
