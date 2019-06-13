<?php
/**
 * Training Helloworld blogpost upgrade script
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('helloworld/blogpost'),'status', array(
        'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'nullable' => false,
        'length'    => 11,
        'after'     => null, // column name to insert new column after
        'comment' => 'Status'
    ));

$installer->endSetup();
