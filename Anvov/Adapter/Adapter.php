<?php
/**
 * Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Adapter implements PhoneInterface
{
    /**
     * MobilePhoneInterface
     */
    protected $mobilePhone;

    /**
     * Constructor
     */
    public function __construct(MobilePhoneInterface $mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * answer a call
     */
    public function pickUpPhone()
    {
        $this->mobilePhone->answerIncoming();
    }

    /**
     * finish the call
     */
    public function putDown()
    {
        $this->mobilePhone->lock();
    }

    /**
     * make a call
     */
    public function dial(int $number)
    {
        $this->mobilePhone->unlock(7834);
        $this->mobilePhone->call($number);
    }
}