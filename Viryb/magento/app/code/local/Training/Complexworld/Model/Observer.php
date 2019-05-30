<?php
/**
 * Training Complexworld Eavblogpost model
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Model_Observer extends Varien_Event_Observer
{
    /**
     * Change content after load Training_Complexworld_Model_Eavblogpost model
     *
     * @param $observer
     */
    public function changeContentAfterLoad($observer)
    {
        $event = $observer->getEvent();
        $post = $event->getObject();
        $post->setContent("{". strtoupper($post->getContent())."}");
    }
}
