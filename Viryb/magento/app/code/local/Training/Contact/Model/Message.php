<?php
/**
 * Training Contact Message Model
 *
 * @category Training
 * @package Training_Contact
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Contact_Model_Message extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('contact/message');
    }
}