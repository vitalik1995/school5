<?php
/**
 * Training Storelocator widget tabs
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Tabs constructor
     *
     * Training_Storelocator_Block_Adminhtml_Store_Edit_Tabs constructor.
     * @throws Varien_Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('store_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('storelocator')->__('Store Information'));
    }

    /**
     * Add tabs
     *
     * @return Mage_Core_Block_Abstract
     * @throws Exception
     */
    protected function _beforeToHtml()
    {
        $this->addTab('main_section', array(
            'label' => Mage::helper('storelocator')->__('Main Information'),
            'title' => Mage::helper('storelocator')->__('Main Information'),
            'content' => $this->getLayout()->createBlock('storelocator/adminhtml_store_edit_tab_maininfo')->toHtml(),
            'active' => true
        ));

        $this->addTab('address_section', array(
            'label' => Mage::helper('storelocator')->__('Store Address'),
            'title' => Mage::helper('storelocator')->__('Store Address'),
            'content' => $this->getLayout()->createBlock('storelocator/adminhtml_store_edit_tab_address')->toHtml(),
        ));

        $this->addTab('contact_section', array(
            'label' => Mage::helper('storelocator')->__('Store Contact'),
            'title' => Mage::helper('storelocator')->__('Store Contact'),
            'content' => $this->getLayout()->createBlock('storelocator/adminhtml_store_edit_tab_contact')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}
