<?php
/**
 * Training Luxurytax block
 *
 * @category Training
 * @package Training_Luxurytax
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Luxurytax_Block_Total_Luxurytax_Luxurytax extends Mage_Sales_Block_Order_Totals
{
    /**
     * Get parent block source
     *
     * @return Mage_Sales_Model_Order
     * @throws Varien_Exception
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    /**
     * Luxury Tax total initialization
     *
     * @return $this
     * @throws Varien_Exception
     */
    public function initTotals()
    {
        $order = $this->getSource();
        if ($order->getLuxuryTaxAmount() > 0){
            $this->getParentBlock()->addTotal(
                new Varien_Object(array(
                'code' => 'luxury_tax',
                'value' => $order->getLuxuryTaxAmount(),
                'base_value' => $order->getBaseLuxuryTaxAmount(),
                'label' => $this->__('Luxury Tax'),
            )),'subtotal');
        }
        return $this;
    }
}
