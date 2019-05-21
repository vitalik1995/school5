<?php
/**
 * Training Complexworld Eavblogpost collection
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Model_Resource_Eavblogpost_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('complexworld/eavblogpost');
    }
}