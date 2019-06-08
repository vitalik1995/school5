<?php
/**
 * Training Helloworld Helloworld block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Adminhtml_Helloworld extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = "helloworld";
        $this->_controller = "adminhtml_helloworld";
        $this->_headerText = $this->__("Helloworld");

        parent::__construct();
    }
}
