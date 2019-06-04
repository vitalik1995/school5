<?php
/**
 * Training Complexworld Eavblogpost model
 *
 * @category Training
 * @package Training_Complexworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Complexworld_Model_Eavblogpost extends Mage_Core_Model_Abstract
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'complexworld_eavblogpost';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'object';

    protected function _construct()
    {
        $this->_init('complexworld/eavblogpost');
    }

    public function addToLog()
    {
        Mage::log('custome message in log file from complexworld', null, 'event_debug.log', true);
    }
}
