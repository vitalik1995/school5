<?php
/**
 * Training VirybCarrier Carrier model
 *
 * @category Training
 * @package Training_VirybCarrier
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_VirybCarrier_Model_Carrier
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'training_virybcarrier';

    /**
     * Collect rates
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return bool|false|Mage_Core_Model_Abstract|Mage_Shipping_Model_Rate_Result|null
     * @throws Varien_Exception
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /* @var $result Mage_Shipping_Model_Rate_Result */
        $result = Mage::getModel('shipping/rate_result');

        $result->append($this->_getStandardShippingRate());

        $expressWeightThreshold = $this->getConfigData('express_weight_threshold');
        $eligibleForExpressDelivery = true;
        foreach ($request->getAllItems() as $_item) {
            if ($_item->getWeight() > $expressWeightThreshold) {
                $eligibleForExpressDelivery = false;
            }
        }

        if ($eligibleForExpressDelivery) {
            $result->append($this->_getExpressShippingRate());
        }

        if ($request->getFreeShipping()) {
            /**
             *  If the request has the free shipping flag,
             *  append a free shipping rate to the result.
             */
            $freeShippingRate = $this->_getFreeShippingRate();
            $result->append($freeShippingRate);
        }

        return $result;
    }

    /**
     * Get Standard Shipping Rate
     *
     * @return false|Mage_Core_Model_Abstract|Mage_Shipping_Model_Rate_Result_Method
     * @throws Varien_Exception
     */
    protected function _getStandardShippingRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */

        $rate->setCarrier($this->_code);

        /**
         * getConfigData(config_key) returns the configuration value for the
         * carriers/[carrier_code]/[config_key]
         */
        $rate->setCarrierTitle($this->getConfigData('title'));

        $rate->setMethod('standand');
        $rate->setMethodTitle('Standard');

        $rate->setPrice(4.99);
        $rate->setCost(0);

        return $rate;
    }

    /**
     * Get Express Shipping Rate
     *
     * @return false|Mage_Core_Model_Abstract|Mage_Shipping_Model_Rate_Result_Method
     * @throws Varien_Exception
     */
    protected function _getExpressShippingRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('express');
        $rate->setMethodTitle('Express (Next day)');
        $rate->setPrice(12.99);
        $rate->setCost(0);
        return $rate;
    }

    /**
     * Get Free Shipping Rate
     *
     * @return false|Mage_Core_Model_Abstract|Mage_Shipping_Model_Rate_Result_Method
     * @throws Varien_Exception
     */
    protected function _getFreeShippingRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('free_shipping');
        $rate->setMethodTitle('Free Shipping (3 - 5 days)');
        $rate->setPrice(0);
        $rate->setCost(0);
        return $rate;
    }

    /**
     * Get allowed methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array(
            'standard' => 'Standard',
            'express' => 'Express',
            'free_shipping' => 'Free Shipping',
        );
    }
}
