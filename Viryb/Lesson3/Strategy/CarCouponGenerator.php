<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

interface CarCouponGeneratorInterface
{
    /**
     * @return mixed
     */
    public function addSeasonDiscount();

    /**
     * @return mixed
     */
    public function addDiscountWhenBigStock();
}
