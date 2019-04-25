<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "Configuration.php";

class User
{
    /**
     * @var string
     */
    private $name = "User name";

    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct($name, Configuration $configuration)
    {
        $this->name = $name;
        $this->configuration = $configuration;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

}
