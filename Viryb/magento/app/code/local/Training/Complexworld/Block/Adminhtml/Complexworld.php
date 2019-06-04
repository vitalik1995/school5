<?php
/**
 *
 * @category ${CATEGORY}
 * @package ${NAMESPACE}_${MODULE}
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_Adminhtml_Complexworld extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_complexworld';
        $this->_blockGroup = 'complexworld';
        $this->_headerText = Mage::helper('complexworld')->__('Post Manager');
        $this->_addButtonLabel = Mage::helper('complexworld')->__('Add Post');
        parent::__construct();
    }
}