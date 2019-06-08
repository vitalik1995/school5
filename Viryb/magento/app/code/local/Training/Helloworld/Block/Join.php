<?php
/**
 * Training Helloworld Hello block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Join extends Mage_Core_Block_Template
{

    /**
     * Get post collection
     *
     * @return object
     */
    public function getPostCollection()
    {
        $posts = Mage::getModel('helloworld/blogpost')->getCollection();

        return $posts;
    }


}
