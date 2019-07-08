<?php
/**
 * Training Storelocator grid container
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Store constructor
     *
     * Training_Storelocator_Block_Adminhtml_Store constructor.
     */
    public function __construct()
    {
        $this->_blockGroup = "storelocator";
        $this->_controller = "adminhtml_store";
        $this->_headerText = Mage::helper('storelocator')-> __("Stores");
        $this->_addButtonLabel = Mage::helper('storelocator')->__('Add Store');

        parent::__construct();
    }
}
