<?php
/**
 * Training Storelocator widget form
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Edit_Tab_Contact extends Mage_Adminhtml_Block_Widget_Form
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

        $fieldset->addField('phone_number', 'text', array(
            'name'   => 'phone_number',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Phone number'),
            'title'  => Mage::helper('storelocator')->__('Phone number'),
        ));

        $fieldset->addField('contact_email', 'text', array(
            'name'   => 'contact_email',
            'required'  => true,
            'class'   => 'validate-email',
            'label'  => Mage::helper('storelocator')->__('Contact email'),
            'title'  => Mage::helper('storelocator')->__('Contact email'),
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
