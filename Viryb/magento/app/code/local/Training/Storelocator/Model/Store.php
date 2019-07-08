<?php
/**
 * Training Storelocator Store model
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Store extends Mage_Core_Model_Abstract
{
    /**
     * Store constructor
     */
    protected function _construct()
    {
        $this->_init('storelocator/store');
    }
}
