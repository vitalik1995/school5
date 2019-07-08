<?php
/**
 * Training Storelocator install-0.1.0
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$installer = $this;
$installer->startSetup();


$installer->addEntityType('storelocator_store', array(
    'entity_model' => 'storelocator/store',
    'table' => 'storelocator/store',
));

$installer->createEntityTables(
    $this->getTable('storelocator/store')
);

$this->addAttribute('storelocator_store', 'status', array(
    'input' => 'boolean',
    'type' => 'int',
    'label' => 'Status',
    'default' => 0,
    'required' => true,
    'unique' => false,
));


$this->addAttribute('storelocator_store', 'store_name', array(
    'type' => 'text',
    'label' => 'Store Name',
    'input' => 'text',
    'required' => true,
    'unique' => false,
));

$this->addAttribute('storelocator_store', 'seller_code', array(
    'type' => 'text',
    'label' => 'Seller code',
    'input' => 'text',
    'unique' => true,
    'required' => true,
));

$this->addAttribute('storelocator_store', 'description', array(
    'type' => 'text',
    'label' => 'Description',
    'input' => 'textarea',
    'required' => false,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'street', array(
    'type' => 'text',
    'label' => 'Street',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'postcode', array(
    'type' => 'text',
    'label' => 'Postcode',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'city', array(
    'type' => 'text',
    'label' => 'City',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'country', array(
    'type' => 'varchar',
    'input' => 'select',
    'label' => 'Country',
    'class' => 'countries',
    'source' => 'adminhtml/system_config_source_country',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'latitude', array(
    'type' => 'text',
    'label' => 'Latitude',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'longitude', array(
    'type' => 'text',
    'label' => 'Longitude',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'phone_number', array(
    'type' => 'text',
    'label' => 'Phone number',
    'input' => 'text',
    'required' => true,
    'unique' => false,

));

$this->addAttribute('storelocator_store', 'contact_email', array(
    'type' => 'text',
    'label' => 'Contact email',
    'class' => 'validate-email',
    'required' => true,
    'unique' => false,
    'input_validation'  => 'email'

));

$installer->endSetup();
