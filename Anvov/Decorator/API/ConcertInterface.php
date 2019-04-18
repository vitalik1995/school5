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
interface ConcertInterface
{
    /**
     * how many people can go
     */
    public function capacity();

    /**
     * how much we get
     */
    public function totalMoney();
}