<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarCouponGenerator.php";

class BmwCouponGenerator implements CarCouponGeneratorInterface
{
    /**
     * @var int
     */
    private $discount = 0;

    /**
     * @var bool
     */
    private $isSeason = false;

    /**
     * @var bool
     */
    private $isBigStock = true;

    /**
     * @return int
     */
    public function addDiscountWhenBigStock()
    {
        if(!($this->isSeason)) return $this->discount += 5;
         else return $this->discount += 0;
    }

    /**
     * @return int
     */
    public function addSeasonDiscount()
    {
        if($this->isBigStock) return $this->discount += 7;
        else return $this->discount += 0;
    }
}
