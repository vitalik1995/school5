<?php


class Factory
{
    protected static $cars = [];

    public static function pushAuto(Auto $auto)
    {
        self::$cars[$auto->getModels()] = $auto;
    }

    public static function getAuto($models)
    {
        return isset(self::$cars[$models]) ? self::$cars[$models] : null;
    }
}
