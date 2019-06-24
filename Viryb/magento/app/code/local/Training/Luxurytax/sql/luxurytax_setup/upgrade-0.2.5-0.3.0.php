<?php
/**
 * Training Luxurytax upgrage
 *
 * @category Training
 * @package Training_Luxurytax
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('sales/invoice'), 'luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Luxury Tax Amount'

    ));
$installer->getConnection()
    ->addColumn($installer->getTable('sales/invoice'), 'base_luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Base Luxury Tax Amount'
    ));
$installer->getConnection()
    ->addColumn($installer->getTable('sales/creditmemo'), 'luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Luxury Tax Amount'

    ));
$installer->getConnection()
    ->addColumn($installer->getTable('sales/creditmemo'), 'base_luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Base Luxury Tax Amount'
    ));

$installer->endSetup();
