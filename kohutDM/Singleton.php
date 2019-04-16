<?php

namespace school5\kohutDM;

final class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    /**
     * @var string
     */
    private $castleKey = "The door is opening!";

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getCastleKey($password)
    {
        if ($password == "Sim Sim open up!"){
            return $this->castleKey;
        } else {
            return "Wrong password!";
        }
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
    }
}