<?php
/**
 * Training Storelocator import entity store model
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Import_Entity_Store extends Mage_ImportExport_Model_Import_Entity_Abstract
{
    /**
     * const SELLER_CODE
     */
    const SELLER_CODE = 'seller_code';

    const CONTACT_EMAIL = 'contact_email';

    /**
     * const TABLE_ENTITY
     */
    const TABLE_ENTITY = 'storelocator';

    /**
     * Error codes.
     */
    const ERROR_INVALID_EMAIL                  = 'invalidEmail';
    const ERROR_DUPLICATE_SELLER_CODE_SITE     = 'duplicateSellerCodeSite';
    const ERROR_SELLER_CODE_IS_EMPTY           = 'sellercodeIsEmpty';
    const ERROR_VALUE_IS_REQUIRED              = 'valueIsRequired';
    const ERROR_SELLER_CODE_NOT_FOUND          = 'sellerCodeNotFound';

    /**
     * Validation failure message template definitions
     *
     * @var array
     */
    protected $_messageTemplates = array(
        self::ERROR_INVALID_EMAIL              => 'E-mail is invalid',
        self::ERROR_DUPLICATE_SELLER_CODE_SITE => 'Seller Code is duplicated in import file',
        self::ERROR_SELLER_CODE_IS_EMPTY       => 'Seller Code is not specified',
        self::ERROR_VALUE_IS_REQUIRED          => "Required attribute '%s' has an empty value",
        self::ERROR_SELLER_CODE_NOT_FOUND      => 'Seller code  is not found',

    );

    /**
     * @var array $_oldStores
     */
    protected $_oldStores = [];

    /**
     * @var array $_newStores
     */
    protected $_newStores = [];

    /**
     * @var array $_attributes
     */
    protected $_attributes = [];

    /**
     * @var $_entityTable
     */
    protected $_entityTable;


    /**
     * Import Entity Store constructor
     *
     * Training_Storelocator_Model_Import_Entity_Store constructor.
     * @throws Varien_Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->_initAttributes()->_initRetailers();
        $this->_entityTable = Mage::getModel('storelocator/store')->getResource()->getEntityTable();
    }

    /**
     * Init attributes
     *
     * @return $this
     * @throws Varien_Exception
     */
    protected function _initAttributes()
    {
        $collection = Mage::getResourceModel('eav/entity_attribute_collection')->addFieldToFilter('entity_type_id', 10);
        foreach ($collection as $attribute) {
            $attributeArray = array(
                'id' => $attribute->getId(),
                'is_required' => $attribute->getIsRequired(),
                'is_static' => $attribute->isStatic(),
                'rules' => $attribute->getValidateRules()
                    ? Mage::helper('core/unserializeArray')->unserialize($attribute->getValidateRules())
                    : null,
                'type'        => Mage_ImportExport_Model_Import::getAttributeType($attribute),
                'options' => $this->getAttributeOptions($attribute)
            );

            $this->_attributes[$attribute->getAttributeCode()] = $attributeArray;
        }

        return $this;
    }

    /**
     * Get options for country attribute
     *
     * @param Mage_Eav_Model_Entity_Attribute_Abstract $attribute
     * @param array $indexValAttrs
     * @return array
     * @throws Varien_Exception
     */
    public function getAttributeOptions(Mage_Eav_Model_Entity_Attribute_Abstract $attribute, $indexValAttrs = array())
    {
        $options = array();

        if ($attribute->usesSource()) {
            // merge global entity index value attributes
            $indexValAttrs = array_merge($indexValAttrs, $this->_indexValueAttributes);

            // should attribute has index (option value) instead of a label?
            $index = in_array($attribute->getAttributeCode(), $indexValAttrs) ? 'value' : 'label';

            $options = Mage::getModel($attribute->getData('source_model'))->toOptionArray();
            try {
                foreach ($options as $option) {
                    $value = is_array($option['value']) ? $option['value'] : array($option);
                    foreach ($value as $innerOption) {
                        if (strlen($innerOption['value'])) { // skip ' -- Please Select -- ' option
                            $options[strtolower($innerOption[$index])] = $innerOption['value'];
                        }
                    }
                }
            } catch (Exception $e) {
                // ignore exceptions connected with source models
            }
        }
        return $options;
    }
    /**
     * Get existing stores
     *
     * @return $this
     */
    protected function _initRetailers()
    {
        foreach (Mage::getResourceModel('storelocator/store_collection') as $store) {
            $sellerCode = $store->load($store->getId())->getSellerCode();

            if (!isset($this->_oldStores[$sellerCode])) {
                $this->_oldStores[$sellerCode] = array();
            }
            $this->_oldStores[$sellerCode] = $store->getId();
        }

        return $this;
    }

    /**
     * Import data
     *
     * @return bool
     * @throws Zend_Validate_Exception
     */
    protected function _importData()
    {
        if (Mage_ImportExport_Model_Import::BEHAVIOR_DELETE == $this->getBehavior()) {
            $this->_deleteStores();
        } else {
            $this->_saveStores();

            return true;
        }
    }


    /**
     * Save stores to DB
     *
     * @return $this
     * @throws Zend_Validate_Exception
     */
    protected function _saveStores()
    {
        $resource = Mage::getModel('storelocator/store');
        $table = $resource->getResource()->getEntityTable();
        $nextEntityId = Mage::getResourceHelper('importexport')->getNextAutoincrement($table);

        while ($bunch = $this->_dataSourceModel->getNextBunch()) {
            $entityRowsIn = array();
            $entityRowsUp = array();
            $attributes = array();

            $oldStoresToLower = array_change_key_case($this->_oldStores, CASE_LOWER);

            foreach ($bunch as $rowNum => $rowData) {
                if (!$this->validateRow($rowData, $rowNum)) {
                    continue;
                }

                $sellerCodeToLower = strtolower($rowData[self::SELLER_CODE]);

                if (isset($oldStoresToLower[$sellerCodeToLower])) { //edit
                    $entityId = $oldStoresToLower[$sellerCodeToLower];
                    $entityRow['entity_id'] = $entityId;
                    $entityRowsUp[] = $entityRow;
                } else { // create
                    $entityId = $nextEntityId++;
                    $entityRow['entity_id'] = $entityId;
                    $entityRow['entity_type_id'] = $this->_entityTypeId;
                    $entityRow['is_active'] = 1;
                    $entityRowsIn[] = $entityRow;
                    $this->_newStores[$rowData[self::SELLER_CODE]] = $entityId;
                }
                foreach (array_intersect_key($rowData, $this->_attributes) as $attrCode => $value) {

                    if (!$this->_attributes[$attrCode]['is_static'] && strlen($value)) {
                        $attribute = Mage::getResourceModel('storelocator/store')->getAttribute($attrCode);
                        $backModel = $attribute->getBackendModel();
                        $attrParams = $this->_attributes[$attrCode];

                        $attributes[$attribute->getBackend()->getTable()][$entityId][$attrParams['id']] = $value;

                        // restore 'backend_model' to avoid default setting
                        $attribute->setBackendModel($backModel);
                    }
                }
            }

            $this->_saveStoreEntity($entityRowsIn, $entityRowsUp)->_saveStoreAttributes($attributes);
        }

        return $this;
    }

    /**
     * Delete stores
     *
     * @return $this
     * @throws Zend_Validate_Exception
     */
    protected function _deleteStores()
    {
        while ($bunch = $this->_dataSourceModel->getNextBunch()) {
            $idToDelete = array();

            foreach ($bunch as $rowNum => $rowData) {
                if ($this->validateRow($rowData, $rowNum)) {
                    $idToDelete[] = $this->_oldStores[$rowData[self::SELLER_CODE]];
                }
            }
            if ($idToDelete) {
                $this->_connection->query(
                    $this->_connection->quoteInto(
                        "DELETE FROM `{$this->_entityTable}` WHERE `entity_id` IN (?)", $idToDelete
                    )
                );
            }
        }
        return $this;
    }

    /**
     * Save store entity to DB
     *
     * @param array $entityRowsIn
     * @param array $entityRowsUp
     * @return $this
     */
    protected function _saveStoreEntity(array $entityRowsIn, array $entityRowsUp)
    {
        if ($entityRowsIn) {
            $this->_connection->insertMultiple($this->_entityTable, $entityRowsIn);
        }

        if ($entityRowsUp) {
            $this->_connection->insertOnDuplicate(
                $this->_entityTable,
                $entityRowsUp
            );
        }

        return $this;
    }

    /**
     * Save store attributes to DB
     *
     * @param array $attributesData
     * @return $this
     */
    protected function _saveStoreAttributes(array $attributesData)
    {
        foreach ($attributesData as $tableName => $data) {
            $tableData = array();

            foreach ($data as $storeId => $attrData) {
                foreach ($attrData as $attributeId => $value) {
                    $tableData[] = array(
                        'entity_id' => $storeId,
                        'entity_type_id' => $this->_entityTypeId,
                        'attribute_id' => $attributeId,
                        'value' => $value
                    );
                }
            }
            $this->_connection->insertOnDuplicate($tableName, $tableData, array('value'));
        }

        return $this;
    }


    /**
     *  Validation rows
     *
     * @param array $rowData
     * @param int $rowNum
     * @return bool
     * @throws Zend_Validate_Exception
     */
    public function validateRow(array $rowData, $rowNum)
    {
        static $sellerCode = null; // seller_code is remembered through all customer rows
        static $email = null;

        if (isset($this->_validatedRows[$rowNum])) {
            return !isset($this->_invalidRows[$rowNum]);
        }

        $this->_validatedRows[$rowNum] = true;

        $this->_processedEntitiesCount++;

        $email = $rowData[self::CONTACT_EMAIL];
        $sellerCode = $rowData[self::SELLER_CODE];
        $sellerCodeToLower = strtolower($rowData[self::SELLER_CODE]);

        $oldStoresToLower = array_change_key_case($this->_oldStores, CASE_LOWER);
        $newStoresToLower = array_change_key_case($this->_newStores, CASE_LOWER);

        if (Mage_ImportExport_Model_Import::BEHAVIOR_DELETE == $this->getBehavior()) {
            if (!isset($oldStoresToLower[$sellerCodeToLower])) {
                $this->addRowError(self::ERROR_SELLER_CODE_NOT_FOUND, $rowNum);
            }
        }
        elseif (!Zend_Validate::is($email, 'EmailAddress')) {
            $this->addRowError(self::ERROR_INVALID_EMAIL, $rowNum);
        } else {
            if (isset($newStoresToLower[$sellerCodeToLower])) {
                $this->addRowError(self::ERROR_DUPLICATE_SELLER_CODE_SITE, $rowNum);
            }
            $this->_newStores[$sellerCode] = false;

            foreach ($this->_attributes as $attrCode => $attrParams) {
                if (isset($rowData[$attrCode]) && strlen($rowData[$attrCode])) {

                    if ($attrCode == 'country') {
                        if ($this->countryInArray($rowData[$attrCode], $this->_attributes[$attrCode]['options'])) {
                            continue;
                        }
                    }

                    $this->isAttributeValid($attrCode, $attrParams, $rowData, $rowNum);

                } elseif ($attrParams['is_required'] && !isset($oldStoresToLower[$sellerCode])) {
                    $this->addRowError(self::ERROR_VALUE_IS_REQUIRED, $rowNum, $attrCode);
                }
            }
        }

        if (null === $sellerCode) {
            $this->addRowError(self::ERROR_SELLER_CODE_IS_EMPTY, $rowNum);
        }

        return !isset($this->_invalidRows[$rowNum]);
    }

    /**
     * Check counties in array
     *
     * @param $elem
     * @param array $array
     * @return bool
     */
    public function countryInArray($elem, array $array)
    {
        foreach ($array as $item) {
            if ($item == $elem) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get entity type code
     *
     * @return string
     */
    public function getEntityTypeCode()
    {
        return 'storelocator_store';
    }
}
