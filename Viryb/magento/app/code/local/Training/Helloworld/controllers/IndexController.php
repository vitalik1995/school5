<?php
/**
 * Training Helloworld
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function goodbyeAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function defaultAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}