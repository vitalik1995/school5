<?php
/**
 * Training Helloworld blogpost collection
 *
 * @category Training
 * @package Training_Helloword
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('helloworld/blogpost');
    }

}
