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


class TernopilHall implements ConcertInterface
{
    /**
     * @var int
     */
    private $hall = 2000;

    /**
     * @var int
     */
    private $ticketPrice = 30;

    /**
     * @return int
     */
    public function capacity()
    {
        return $this->hall;
    }

    /**
     * @return float|int
     */
    public function totalMoney()
    {
        $money = $this->hall * $this->ticketPrice;
        return $money;
    }
}