<?php
/**
 * Training Luxurytax Sales Quote Address Total Luxurytax model
 *
 * @category Training
 * @package Training_Luxurytax
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Luxurytax_Model_Sales_Quote_Address_Total_Luxurytax extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return Mage::helper('luxurytax')->__('Luxury Tax');
    }

    /**
     * Set luxury tax to address
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return $this|Mage_Sales_Model_Quote_Address_Total_Abstract
     * @throws Mage_Core_Model_Store_Exception
     * @throws Varien_Exception
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $quote = $address->getQuote();
        $this->_setAmount(0);
        $this->_setBaseAmount(0);

        $quote->setLuxuryTaxAmount(0);
        $quote->setBaseLuxuryTaxAmount(0);

        if (!$quote->isVirtual() && $address->getAddressType() == 'billing') {
            return $this;
        }

        $baseLuxuryTaxAmount = $this->_getBaseLuxuryTaxAmount();

        if ($this->_canApplyLuxuryTax($address) && $baseLuxuryTaxAmount) {
            $luxuryTaxAmount = Mage::app()->getStore()->convertPrice($baseLuxuryTaxAmount);

            $quote->setLuxuryTaxAmount($luxuryTaxAmount);
            $quote->setBaseLuxuryTaxAmount($baseLuxuryTaxAmount);

            $this->_addAmount($luxuryTaxAmount);
            $this->_addBaseAmount($baseLuxuryTaxAmount);
        }

        return $this;
    }

    /**
     * Get base luxury tax amount
     *
     * @return float
     */
    protected function _getBaseLuxuryTaxAmount()
    {
        return (float) Mage::getStoreConfig('luxurytax/luxurytax_group/luxurytax_luxury_tax_amount');
    }

    /**
     * Check possibility applying luxury tax
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return bool
     */
    protected function _canApplyLuxuryTax(Mage_Sales_Model_Quote_Address $address)
    {
        $result = false;
        $isEnabled = Mage::getStoreConfig('luxurytax/luxurytax_group/luxurytax_fetch_bool');
        $priceBoundary = (float) Mage::getStoreConfig('luxurytax/luxurytax_group/luxurytax_price');

        if ($isEnabled) {
            foreach ($this->_getAddressItems($address) as $item) {
                if (!$item->getData('parent_item_id') && $item->getData('price') >= $priceBoundary) {
                    $result = true;
                    break;
                }
            }
        }

        return $result;
    }

    /**
     * Displaying luxury tax
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return $this|array
     * @throws Varien_Exception
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        $luxuryTaxAmount = $address->getLuxuryTaxAmount();

        if ($luxuryTaxAmount > 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => $this->getLabel(),
                'value' => $luxuryTaxAmount,
            ));
        }

        return $this;
    }
}
