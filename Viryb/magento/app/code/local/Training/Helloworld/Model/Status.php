<?php
/**
 * Training Helloworld blobpost model
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Model_Status extends Varien_Object
{
    const STATUS_ENABLED    = 1;
    const STATUS_DISABLED   = 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('helloworld')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('helloworld')->__('Disabled')
        );
    }
}
