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
    ->changeColumn($installer->getTable('helloworld/blogpost'), 'post', 'post', array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => false,
            'comment' => 'Blogpost Body'
        )
    );
$installer->endSetup();
