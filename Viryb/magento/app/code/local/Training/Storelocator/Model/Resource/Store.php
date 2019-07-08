<?php
/**
 * Training Storelocator Store resource model
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Resource_Store extends Mage_Eav_Model_Entity_Abstract
{
    /**
     * Resourece model construct
     *
     * @throws Varien_Exception
     */
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('storelocator_store');
        $this->setConnection(
            $resource->getConnection('storelocator_read'),
            $resource->getConnection('storelocator_write')
        );
    }
}
