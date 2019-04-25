<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarModification.php";

class TapeRecorder extends CarModification
{
    const PRICE_TAPE_RECORDER = 50;
    const NAME_OF_OPTION = " Tape Recorder ";

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->car->getCost() + self::PRICE_TAPE_RECORDER;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->car->getDescription(). self::NAME_OF_OPTION;
    }
}
