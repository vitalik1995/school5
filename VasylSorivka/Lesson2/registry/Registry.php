<?php


class Registry
{
    protected static $data = [];

    public static function setData($key, $value)
    {
        if (empty($value)){
            tHrow new Exception('errors SET');
        }
        self::$data[$key] = $value;
    }

    public static function getData($key)
    {
        if (!in_array($key,self::$data) AND !isset(self::$data[$key])){
            throw new Exception('errors GET');
        }
        return self::$data[$key];
    }

    public static function removeData($key)
    {
        if (array_key_exists($key,self::$data)){
            unset(self::$data[$key]);
        }
    }
}
