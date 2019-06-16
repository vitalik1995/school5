<?php
/**
 * Training Contact Message Install Script
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('contact/message'))
    ->addColumn('message_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Message ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Email')
    ->addColumn('telephone', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Telephone')
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Comment')
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Answer')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, 2, array(
        'nullable' => false,
        'default' => '0'
    ), 'Status')
    ->setComment('Training contacts/message table');

$installer->getConnection()->createTable($table);

$installer->endSetup();