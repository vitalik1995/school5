<?php
/**
 * Training Complexworld block
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_Edit extends Mage_Core_Block_Template
{
    public function getPost()
    {
        return Mage::registry('editPost');
    }
}
