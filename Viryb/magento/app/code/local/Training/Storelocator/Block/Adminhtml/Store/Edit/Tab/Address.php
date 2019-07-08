<?php
/**
 * Training Storelocator widget form
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Block_Adminhtml_Store_Edit_Tab_Address extends Mage_Adminhtml_Block_Widget_Form
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

        $fieldset->addField('city', 'text', array(
            'name'   => 'city',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('City'),
            'title'  => Mage::helper('storelocator')->__('City'),
        ));

        $fieldset->addField('street', 'text', array(
            'name'   => 'street',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Street'),
            'title'  => Mage::helper('storelocator')->__('Street'),
        ));

        $fieldset->addField('postcode', 'text', array(
            'name'   => 'postcode',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Postcode'),
            'title'  => Mage::helper('storelocator')->__('Postcode'),
        ));

        $fieldset->addField('country', 'select', array(
            'name'  =>   'country',
            'label'     => Mage::helper('storelocator')->__('Country'),
            'required'  => true,
            'values'    => Mage::getModel('adminhtml/system_config_source_country') -> toOptionArray(),
        ));

        $fieldset->addField('latitude', 'text', array(
            'name'   => 'latitude',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Latitude'),
            'title'  => Mage::helper('storelocator')->__('Latitude'),
        ));

        $fieldset->addField('longitude', 'text', array(
            'name'   => 'longitude',
            'required'  => true,
            'label'  => Mage::helper('storelocator')->__('Longitude'),
            'title'  => Mage::helper('storelocator')->__('Longitude'),
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
