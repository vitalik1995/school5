<?php
/**
 * Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Adapter/API/MobilePhoneInterface.php";


class MobilePhone implements MobilePhoneInterface
{
    /**
     * number user call to
     *
     * @var int
     */
    private $number;

    /**
     * trace of stream
     */
    private $state = false;

    /**
     * by default mobile phone is locked
     */
    private $locked = true;

    /**
     * password to unlock
     */
    private $password = 7834;

    /**
     * answer a call
     */
    public function answerIncoming()
    {
        $this->state = true;
    }

    /**
     * unlock mobile phone
     */
    public function unlock(int $password)
    {
        if($this->locked = true && $password == $this->password) {
            $this->locked = false;
        }
        return $this->locked;
    }

    /**
     * lock mobile phone
     */
    public function lock()
    {
        if($this->locked = false) {
            $this->locked = true;
        }
        return $this->locked;
    }

    /**
     * make a call
     */
    public function call(int $number)
    {
        $this->number = $number;
        if($this->locked = false) {
            $this->state = true;
            return new PDO($this->number);
        }
        return "please unclock the phone";
    }
}