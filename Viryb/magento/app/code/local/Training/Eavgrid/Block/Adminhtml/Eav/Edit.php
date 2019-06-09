<?php
/**
 * Training Eavgrid Edit block
 *
 * @category Training
 * @package Training_Eavgrid
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Eavgrid_Block_Adminhtml_Eav_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'training_eavgrid';
        $this->_controller = 'adminhtml_eav';

        parent::__construct();

        $this->_updateButton('save', 'label', $this->__('Save Post'));
        $this->_updateButton('delete', 'label', $this->__('Delete Post'));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('eavpost')->getId()) {
            return $this->__('Edit Post');
        } else {
            return $this->__('New Post');
        }
    }
}
