<?php
/**
 * Training Helloworld blogpost resource model
 *
 * @category Training
 * @package Training_Helloword
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('helloworld/blogpost', 'blogpost_id');
    }
}
