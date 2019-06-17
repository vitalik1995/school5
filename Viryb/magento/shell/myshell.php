<?php
/**
 *  Shell script
 *
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */


require_once 'abstract.php';


class Training_Shell_Contact extends Mage_Shell_Abstract
{

    /**
     * @throws Varien_Exception
     */
    public function run()
    {
        Mage::log($this->generateMail(), null, 'email.log', true);
    }

    /**
     * Get model instance
     *
     * @return Mage_Core_Model_Abstract
     */
    public function getModel()
    {
        return  Mage::getModel('contact/message')->load(7);
    }

    /**
     * Get email with information
     *
     * @return false|Mage_Core_Model_Abstract
     * @throws Varien_Exception
     */
    public function generateMail()
    {
        $mail = Mage::getModel('core/email');
        $mail->setToName($this->getModel()->getName());
        $mail->setToEmail($this->getModel()->getEmail());
        $mail->setBody($this->getModel()->getComment() . " " . $this->getModel()->getAnswer());
        $mail->setFromName('virybShellScript');
        $mail->setType('text');

        return $mail;
    }


}
$shell = new Training_Shell_Contact();
$shell->run();