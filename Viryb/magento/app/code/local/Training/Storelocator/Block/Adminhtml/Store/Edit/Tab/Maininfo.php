<?php
/**
 * Training Storelocator widget form
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Edit_Tab_Maininfo extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('store');

        $form = new Varien_Data_Form(array());

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'   => Mage::helper('storelocator')->__('Store information'),
            'class'    => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
        }

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('storelocator')->__('Status'),
            'required'  => true,
            'name'      => 'status',
            'values' => Mage::getSingleton('storelocator/status')->getOptionArray(),

        ));

        $fieldset->addField('store_name', 'text', array(
            'name'   => 'store_name',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Store Name'),
            'title'  => Mage::helper('storelocator')->__('Store Name'),
        ));

        $fieldset->addField('seller_code', 'text', array(
            'name'   => 'seller_code',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Seller Code'),
            'title'  => Mage::helper('storelocator')->__('Seller Code'),
        ));

        $fieldset->addField('description', 'textarea', array(
            'name'   => 'description',
            'label'  => Mage::helper('storelocator')->__('Description'),
            'title'  => Mage::helper('storelocator')->__('Description'),
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
