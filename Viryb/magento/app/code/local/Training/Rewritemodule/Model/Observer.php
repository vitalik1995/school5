<?php
/**
 *
 * @category Training
 * @package Training_Rewritemodule
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Rewritemodule_Model_Observer extends Varien_Event_Observer
{
    public function saveCmsPageObserve($observer)
    {
       $event = $observer->getEvent();
       $model = $event->getPage();
       $model->setTitle("{" . $model->getTitle() . "}");
    }
}
