<?php
/**
 * Training Helloworld
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_MessagesController extends Mage_Core_Controller_Front_Action {

    public function goodbyeAction() {
        echo 'Goodbye World!';
    }
}