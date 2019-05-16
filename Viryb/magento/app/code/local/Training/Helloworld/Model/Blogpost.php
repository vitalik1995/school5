<?php
/**
 * Training Helloworld blobpost model
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Model_Blogpost extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('helloworld/blogpost');
    }
}
