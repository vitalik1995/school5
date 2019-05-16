<?php
/**
 * Training Helloworld Hello block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Hello extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "Hello block";

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

    /**
     * Get ULR for one post
     *
     * @param Training_Helloworld_Model_Blogpost $post
     * @return string
     * @throws Varien_Exception
     */
    public function getRowUrl(Training_Helloworld_Model_Blogpost $post)
    {
        return $this->getUrl('*/*/detail/id', array(
            'id' => $post->getBlogpostId()
        ));
    }

}
