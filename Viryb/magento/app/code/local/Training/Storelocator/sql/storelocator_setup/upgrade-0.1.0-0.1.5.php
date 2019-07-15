<?php
$installer = $this;
$installer->startSetup();

$tableEntities = [
    'storelocator/store_datetime',
    'storelocator/store_decimal',
    'storelocator/store_int',
    'storelocator/store_text',
    'storelocator/store_varchar',
    'storelocator/store_char',
];

$connection = $installer->getConnection();

foreach ($tableEntities as $tableEntity) {
    $tableName = $installer->getTable($tableEntity);

    if ($connection->isTableExists($tableName)) {
        $connection->addIndex(

            $tableName,
            $installer->getIdxName(
                $tableEntity,
                array('entity_id', 'attribute_id', 'store_id'),
                Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
            ),
            array('entity_id', 'attribute_id', 'store_id'),
            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
        );
    }
}

$installer->endSetup();