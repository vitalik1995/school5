<?php
/**
 * Training Contact Resource Message Collection
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Model_Resource_Message_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('contact/message');
    }
}