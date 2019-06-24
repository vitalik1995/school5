<?php
/**
 * Training Luxurytax Sales Order Creditmemo Total Luxurytax model
 *
 * @category Training
 * @package Training_Luxurytax
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Luxurytax_Model_Sales_Order_Creditmemo_Total_Luxurytax extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    /**
     * Collect total
     *
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @return $this|Mage_Sales_Model_Order_Creditmemo_Total_Abstract
     * @throws Varien_Exception
     */
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();
        $luxuryTaxAmount = $order->getLuxuryTaxAmount();
        $baseLuxuryTaxAmount = $order->getBaseLuxuryTaxAmount();

        $creditmemo->setLuxuryTaxAmount($luxuryTaxAmount);
        $creditmemo->setBaseLuxuryTaxAmount($baseLuxuryTaxAmount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $luxuryTaxAmount);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $luxuryTaxAmount);

        return $this;
    }
}
