<?php
/**
 * Training Storelocator widget form container
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Edit constructor
     *
     * Training_Storelocator_Block_Adminhtml_Store_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'storelocator';
        $this->_controller = 'adminhtml_store';
        $this->_updateButton('save', 'label', $this->__('Save Store'));
        $this->_updateButton('delete', 'label', $this->__('Delete Store'));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('store')->getId()) {
            return $this->__('Edit Store');
        } else {
            return $this->__('New Store');
        }
    }
}
