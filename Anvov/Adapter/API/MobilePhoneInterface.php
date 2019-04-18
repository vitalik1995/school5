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
 * Interface MobilePhoneInterface
 *
 * Made to describe functions of mobile phone
 * @package school5\StaticFactory\API
 */
interface MobilePhoneInterface
{
    /**
     * answer a call
     */
    public function answerIncoming();

    /**
     * unlock mobile phone
     */
    public function unlock(int $password);

    /**
     * make a call
     */
    public function call(int $number);

    /**
     * lock mobile phone
     */
    public function lock();
}