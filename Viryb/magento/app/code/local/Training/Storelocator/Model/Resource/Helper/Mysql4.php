<?php
/**
 * Training Storelocator Helper Mysql4
 *
 * @category Training
 * @package Training_Storelocator
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Storelocator_Model_Resource_Helper_Mysql4 extends Mage_Core_Model_Resource_Helper_Mysql4
{
    /**
     * Constants to be used for DB
     */
    const DB_MAX_PACKET_SIZE        = 1048576; // Maximal packet length by default in MySQL
    const DB_MAX_PACKET_COEFFICIENT = 0.85; // The coefficient of useful data from maximum packet length

    /**
     * Returns maximum size of packet, that we can send to DB
     *
     * @return int
     */
    public function getMaxDataSize()
    {
        $maxPacketData = $this->_getReadAdapter()->fetchRow('SHOW VARIABLES LIKE "max_allowed_packet"');
        $maxPacket = empty($maxPacketData['Value']) ? self::DB_MAX_PACKET_SIZE : $maxPacketData['Value'];
        return floor($maxPacket * self::DB_MAX_PACKET_COEFFICIENT);
    }


    /**
     * Returns next autoincrement value for a table
     *
     * @param $tableName
     * @return mixed
     * @throws Mage_Core_Exception
     */
    public function getNextAutoincrement($tableName)
    {
        $adapter = $this->_getReadAdapter();
        $entityStatus = $adapter->showTableStatus($tableName);

        if (empty($entityStatus['Auto_increment'])) {
            Mage::throwException(Mage::helper('storelocator')->__('Cannot get autoincrement value'));
        }
        return $entityStatus['Auto_increment'];
    }
}
