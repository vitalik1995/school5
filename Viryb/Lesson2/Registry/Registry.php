<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

abstract class Registry
{
    /**
     * @var array
     */
    private static $studentList = [];


    /**
     * Set new student to the list by $ket
     *
     * @param $key
     * @param $value
     */
    public static function setStudentList($key, $value)
    {
        if (!isset(self::$studentList[$key])) {
            self::$studentList[$key] = $value;
        } else {
            echo "Student with {$key} already exist";
        }
    }

    /**
     * Get student from list by $key
     *
     * @return array|string
     */
    public static function getStudentList($key)
    {
        if (isset(self::$studentList[$key])) {
            return self::$studentList[$key];
        } else {
            return "Student with {$key} not exist";
        }
    }
}
