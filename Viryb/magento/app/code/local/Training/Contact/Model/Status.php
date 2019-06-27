<?php
/**
 * Training Contact Status Model
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Model_Status extends Varien_Object
{
    /**
     * const STATUS_ENABLED
     */
    const STATUS_ENABLED    = 1;

    /**
     * const STATUS_DISABLED
     */
    const STATUS_DISABLED   = 2;

    /**
     * Get option array
     *
     * @return array
     */
    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('contact')->__('Yes'),
            self::STATUS_DISABLED   => Mage::helper('contact')->__('No')
        );
    }
}
