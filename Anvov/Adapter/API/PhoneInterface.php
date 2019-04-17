<?php
/**
 * Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
/**
 * Interface PhoneInterface
 *
 * Made to describe functions of regular phone
 * @package school5\StaticFactory\API
 */
interface PhoneInterface
{
    /**
     * answer a call
     */
    public function pickUpPhone();

    /**
     * finish the call
     */
    public function putDown();

    /**
     * make a call
     */
    public function dial(int $number);
}