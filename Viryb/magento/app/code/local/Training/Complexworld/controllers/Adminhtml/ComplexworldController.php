<?php
/**
 *
 * @category ${CATEGORY}
 * @package ${NAMESPACE}_${MODULE}
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Adminhtml_ComplexworldController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('complexworld/complexworld')
            ->_addBreadcrumb(
                Mage::helper('adminhtml')->__('Posts Manager'),
                Mage::helper('adminhtml')->__('Posts Manager')
            );
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('complexworld');
    }
}