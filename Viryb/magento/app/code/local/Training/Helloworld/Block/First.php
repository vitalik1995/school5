<?php
/**
 * Training Helloworld First block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_First extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "First block";

    /**
     * Get message method
     *
     * @return string
     */
    public function getMessage()
    {
        return "The message from " . self::BLOCKNAME;
    }
}