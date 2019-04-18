<?php
/**
 * Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/API/ConcertInterface.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Decorator/Classes/ConcertDecorator.php";

class ExtraSpaceTernopil extends ConcertDecorator
{
    /**
     * @var int
     */
    private $hall = 300;

    /**
     * @var int
     */
    private $ticketPrice = 15;

    /**
     * @return int
     */
    public function capacity()
    {
        return $this->concert->capacity() + $this->hall;
    }

    /**
     * @return float|int
     */
    public function hallMoney()
    {
        $money = $this->hall * $this->ticketPrice;
        return $money;
    }

    /**
     * @return float|int
     */
    public function totalMoney()
    {
        $money = $this->concert->totalMoney() + $this->hallMoney();
        return $money;
    }
}