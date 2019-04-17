<?php
/**
 * Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Adapter/API/PhoneInterface.php";


class Phone implements PhoneInterface
{
    /**
     * number user call to
     *
     * @var int
     */
    private $number;

    /**
     * by default phone is on hold
     */
    private $state = false;

    /**
     * answer a call
     */
    public function pickUpPhone()
    {
        $this->state = true;
    }

    /**
     * finish the call
     */
    public function putDown()
    {
        $this->state = false;
    }

    /**
     * make a call
     */
    public function dial(int $number)
    {
        $this->number = $number;
        $this->pickUpPhone();
        if($this->state = true) {
            return new PDO($this->number);
        }
        return false;
    }
}