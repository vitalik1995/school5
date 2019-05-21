<?php
/**
 * Training Complexworld block
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Block_First extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "First block";

    /**
     * Get message method
     *
     * @return string
     */
    public function getMessage()
    {
        return "The message from " . self::BLOCKNAME;
    }

    /**
     * Get url for redirect
     *
     * @param Training_Complexworld_Model_Eavblogpost $post
     * @return string
     */
    public function getRowUrl(Training_Complexworld_Model_Eavblogpost $post)
    {
        return $this->getUrl('*/*/detail/id', array(
            'id' => $post->getId()
        ));
    }

    /**
     * Get post collection
     *
     * @return Training_Complexworld_Model_Resource_Eavblogpost_Collection
     */
    public function getPosts()
    {
        $collection = Mage::getResourceModel('complexworld/eavblogpost_collection')
            ->addAttributeToSelect('title');
        return $collection->load();

    }
}
