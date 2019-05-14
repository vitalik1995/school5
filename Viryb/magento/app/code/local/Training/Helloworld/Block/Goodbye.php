<?php
/**
 * Training Helloworld Goodbye block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Goodbye extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "Goodbye block";

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