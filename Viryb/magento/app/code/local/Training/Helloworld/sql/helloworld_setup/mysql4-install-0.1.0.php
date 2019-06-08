<?php
/**
 * Training Helloworld blogpost install script
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('helloworld/blogpost'))
    ->addColumn('blogpost_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Blogpost ID')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Blogpost Title')
    ->addColumn('post', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ), 'Blogpost Body')
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
    ), 'Blogpost Date')
    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Timestamp')
    ->setComment('Training helloworld/blogpost entity table');
$installer->getConnection()->createTable($table);

$installer->endSetup();