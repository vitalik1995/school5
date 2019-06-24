<?php
/**
 * Training Luxurytax Sales Order Invoice Total Luxurytax model
 *
 * @category Training
 * @package Training_Luxurytax
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Luxurytax_Model_Sales_Order_Invoice_Total_Luxurytax extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    /**
     * Collect total
     *
     * @param Mage_Sales_Model_Order_Invoice $invoice
     * @return $this|Mage_Sales_Model_Order_Invoice_Total_Abstract
     * @throws Varien_Exception
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $order = $invoice->getOrder();
        $luxuryTaxAmount = $order->getLuxuryTaxAmount();
        $baseLuxuryTaxAmount = $order->getBaseLuxuryTaxAmount();

        $invoice->setLuxuryTaxAmount($luxuryTaxAmount);
        $invoice->setBaseLuxuryTaxAmount($baseLuxuryTaxAmount);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $luxuryTaxAmount);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $luxuryTaxAmount);

        return $this;
    }
}
