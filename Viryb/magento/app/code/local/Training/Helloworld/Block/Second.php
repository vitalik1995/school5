<?php
/**
 * Training Helloworld Second block
 *
 * @category Training
 * @package Training_Helloworld
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Helloworld_Block_Second extends Mage_Core_Block_Template
{
    /**
     * constant with text
     */
    const BLOCKNAME = "Second block";

    private $name = 'Vitalii';

    /**
     * Get message method
     *
     * @return string
     */
    public function getMessage()
    {
        return "The message from " . self::BLOCKNAME;
    }

    /**
     * Set name
     *
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
