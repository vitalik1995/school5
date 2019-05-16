<?php
/**
 * Training Helloworld Third block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Third extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "Third block";

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
