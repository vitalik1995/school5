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
    ->changeColumn($installer->getTable('sales/order'), 'luxury_tax', 'luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Luxurytax Amount'

    ));
$installer->getConnection()
    ->changeColumn($installer->getTable('sales/order'), 'base_luxury_tax', 'base_luxury_tax_amount', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Base Luxurytax Amount'
    ));

$installer->endSetup();
