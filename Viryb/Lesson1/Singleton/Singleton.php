<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */


final class Singleton
{
    /**
     * @var Singleton $instance
     */
    private static $instance;

    public $name;

    /**
     * Singleton constructor.
     */
    private function __construct()
    {

    }

    /**
     * Get instance
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }

    /**
     *  Private method clone
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * Private method wakeup
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
