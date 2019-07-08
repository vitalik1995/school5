<?php
/**
 * Training Storelocator status model
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Status extends Varien_Object
{
    const STATUS_ENABLED    = 1;
    const STATUS_DISABLED   = 0;

    /**
     * Get option array
     *
     * @return array
     */
    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('storelocator')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('storelocator')->__('Disabled')
        );
    }
}
