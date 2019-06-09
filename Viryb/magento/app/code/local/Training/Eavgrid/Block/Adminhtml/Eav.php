<?php
/**
 * Training Eavgrid Eav block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Eavgrid_Block_Adminhtml_Eav extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = "training_eavgrid";
        $this->_controller = "adminhtml_eav";
        $this->_headerText = $this->__("Eav");

        parent::__construct();
    }
}
