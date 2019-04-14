<?php


class Factory
{
    public static function create( $type = '')
    {
        if ($type == '') {
            throw new Exception ('type is empty');
        } else {
            $className = ucfirst($type);
        }
        
        if (class_exists($className)) {
            return new $className();
        } else {
            throw new Exception ('class no exist');
        }
    }   
}

    