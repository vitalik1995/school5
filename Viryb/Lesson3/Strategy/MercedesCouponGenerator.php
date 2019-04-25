<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "BmwCouponGenerator.php";

class MercedesCouponGenerator implements CarCouponGeneratorInterface
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
        if(!($this->isSeason)) return $this->discount += 4;
        else return $this->discount += 0;
    }

    /**
     * @return int
     */
    public function addSeasonDiscount()
    {
        if($this->isBigStock) return $this->discount += 3;
        else return $this->discount += 0;
    }
}
