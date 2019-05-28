<?php
/**
 *
 * @category Training
 * @package Training_Rewritemodule
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Rewritemodule_Model_Customer extends Mage_Customer_Model_Customer
{
    /**
     * This is an overriden method from Mage_Customer_Model_Customer class.
     * This override is just for tutorial purposes
     * @return mixed
     */
    public function getName()
    {
        return "CUSTOMER";
    }
}
