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
    ->changeColumn($installer->getTable('sales/order'), 'luxury_tax', 'luxurytax', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Luxurytax'

    ));
$installer->getConnection()
    ->changeColumn($installer->getTable('sales/order'), 'base_luxury_tax', 'base_luxurytax', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'nullable' => true,
        'length' => '12,4',
        'default' => null,
        'comment' => 'Base Luxurytax'
    ));

$installer->endSetup();
