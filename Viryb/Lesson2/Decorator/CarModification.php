<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarInterface.php";

abstract class CarModification implements CarInterface
{
    /**
     * @var CarInterface
     */
    protected $car;

    /**
     * CarModification constructor.
     * @param CarInterface $car
     */
    public function __construct(CarInterface $car)
    {
        $this->car = $car;
    }
}
