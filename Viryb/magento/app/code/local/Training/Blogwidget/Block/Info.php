<?php
/**
 * Training Blogwidget info block
 *
 * @category Training
 * @package Training_Blogwidget
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Blogwidget_Block_Info extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    /**
     * info construct
     *
     * Training_Blogwidget_Block_Info constructor.
     * @param array $args
     */
    public function __construct(array $args = array())
    {
        parent::__construct($args);
        $this->setTemplate('training/widget/widget.phtml');
    }

    /**
     * Get model
     *
     * @return Mage_Core_Model_Abstract
     * @throws Varien_Exception
     */
    public function getModel()
    {
        if ($this->getBlogId()) {
            return Mage::getModel('helloworld/blogpost')->load($this->getBlogId());
        }
    }

};
