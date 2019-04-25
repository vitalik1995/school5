<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "CarCouponGenerator.php";

class CouponGenerator
{
    const TEXT_FIRST_PART = "Get ";
    const TEXT_SECOND_PERT = "% off the price of your new car.";

    /**
     * @var CarCouponGenerator
     */
    private $carCoupon;

    /**
     * @var
     */
    private $discount;

     /**
     * CouponGenerator constructor.
     * @param CarCouponGeneratorInterface $car
     */
    public function __construct(CarCouponGeneratorInterface $car)
    {
        $this->carCoupon = $car;
    }

    /**
     * @return string
     */
    public function getCoupon()
    {
        $this->discount = $this->carCoupon->addSeasonDiscount();
        $this->discount = $this->carCoupon->addDiscountWhenBigStock();
        return self::TEXT_FIRST_PART. $this->discount .self::TEXT_SECOND_PERT;
    }
}
