<?php
/**
 * Training Contact Edit block
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Block_Adminhtml_Message_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'contact';
        $this->_controller = 'adminhtml_message';
        $coreHelper = Mage::helper('core');


        parent::__construct();
        $confirmationMessage = $coreHelper->jsQuoteEscape(
            Mage::helper('sales')->__('Are you sure? This order will be canceled and a new one will be created instead'));
        $this->_updateButton('save', 'label', $this->__('Save Message'));
        $this->_updateButton('delete', 'label', $this->__('Delete Message'));
        $this->addButton('send_notification', array(
            'label'     => Mage::helper('sales')->__('Send Email'),
            'onclick'   => "location.href='".$this->getUrl('*/*/send/id/'.$this->getRequest()->getParam('id'))."'",
        ));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('email')->getId()) {
            return $this->__('Edit Post');
        } else {
            return $this->__('New Post');
        }
    }
}
