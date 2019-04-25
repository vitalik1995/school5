<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class CarFactory
{
    /**
     * @var array
     */
    private $carArray = array(
        'bmw' => 'BmwCouponGenerator',
        'mercedes' => 'MercedesCouponGenerator'
    );

    /**
     * @param $car
     * @return mixed
     */
    public function couponObjectGenerator($car)
    {
        return new $this->carArray[$car]();
    }
}
