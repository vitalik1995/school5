<?php
/**
 * Training Complexworld Eavblogpost model
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Model_ObserverSaveBefore extends Varien_Event_Observer
{
    /**
     * Change title before save Training_Complexworld_Model_Eavblogpost model
     *
     * @param $observer
     */
    public function changeTitleSaveBefore($observer)
    {
        $event = $observer->getEvent();
        $post = $event->getObject();
        $post->setTitle("[". strtolower($post->getTitle())."]");
    }
}
