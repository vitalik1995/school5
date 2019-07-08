<?php
/**
 * Training Storelocator Store collection
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Resource_Store_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    /**
     * Store collection construct
     */
    protected function _construct()
    {
        $this->_init('storelocator/store');
    }
}
