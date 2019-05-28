<?php
/**
 *
 * @category Training
 * @package Training_Rewritemodule
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

//require_once(Mage::getModuleDir('controllers','Mage_Customer').DS. 'AccountController.php');

require_once "Mage/Customer/controllers/AccountController.php";

class Training_Rewritemodule_AccountController extends Mage_Customer_AccountController
{
    public function editAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');

        $block = $this->getLayout()->getBlock('customer_edit');
        if ($block) {
            $block->setRefererUrl($this->_getRefererUrl());
        }
        $data = $this->_getSession()->getCustomerFormData(true);
        $customer = $this->_getSession()->getCustomer();
        $customer->setData('firstname', strtoupper($customer->getData('firstname')));
        if (!empty($data)) {
            $customer->addData($data);
        }

        if ($this->getRequest()->getParam('changepass') == 1) {
            $customer->setChangePassword(1);
        }

        $this->getLayout()->getBlock('head')->setTitle($this->__('Account Information Rewrite'));
        $this->getLayout()->getBlock('messages')->setEscapeMessageFlag(true);
        $this->renderLayout();
    }

}
