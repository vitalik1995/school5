<?php
/**
 *
 * @category Training
 * @package Training_Rewritemodule
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Rewritemodule_Block_Form_Register extends Mage_Customer_Block_Form_Register
{

    public function getBackUrl()
    {

        $url = $this->getData('back_url');

        return $url;
    }
    public function getFormData()
    {
        $data = $this->getData('form_data');
        if (is_null($data)) {
            $formData = Mage::getSingleton('customer/session')->getCustomerFormData(true);
            $data = new Varien_Object();
            if ($formData) {
                $data->addData($formData);
                $data->setCustomerData(1);
                $data->setFirstname(strtoupper($data->getData('firstname')));

            }
            if (isset($data['region_id'])) {
                $data['region_id'] = (int)$data['region_id'];
            }
            $this->setData('form_data', $data);
        }
        return $data;
    }

    public function isNewsletterEnabled()
    {
       // return Mage::helper('core')->isModuleOutputEnabled('Mage_Newsletter');
    }
}
