<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Configuration
{
    /**
     * @var int
     */
    private $volumeLevel = 0;

    /**
     * @var string
     */
    private $colorOfTheme = "White";

    /**
     * Configuration constructor.
     *
     * @param $volumeLevel
     * @param $colorOfTheme
     */
    public function __construct($volumeLevel, $colorOfTheme)
    {
        $this->volumeLevel = $volumeLevel;
        $this->colorOfTheme = $colorOfTheme;
    }

    /**
     * @return string
     */
    public function getColorOfTheme()
    {
        return $this->colorOfTheme;
    }

    /**
     * @return int
     */
    public function getVolumeLevel()
    {
        return $this->volumeLevel;
    }
}
