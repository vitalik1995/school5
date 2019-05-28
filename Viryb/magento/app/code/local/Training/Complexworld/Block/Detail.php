<?php
/**
 * Training Complexworld block
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_Detail extends Mage_Core_Block_Template
{


    public function getEditUrl(Training_Complexworld_Model_Eavblogpost $post)
    {
        return $this->getUrl('*/*/edit/id', array(
            'id' => $post->getId()
        ));
    }

    public function getDeleteUrl(Training_Complexworld_Model_Eavblogpost $post)
    {
        return $this->getUrl('*/*/delete/id', array(
            'id' => $post->getId()
        ));
    }

    public function getPost()
    {
        return Mage::registry('post');
    }
}
