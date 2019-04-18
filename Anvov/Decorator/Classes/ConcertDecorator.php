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


abstract class ConcertDecorator implements ConcertInterface
{
    /**
     * type of car
     */
    protected $concert;

    public function __construct(ConcertInterface $concert)
    {
        $this->concert = $concert;
    }
}