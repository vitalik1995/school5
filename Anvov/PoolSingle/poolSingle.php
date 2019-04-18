<?php

// Пул одиночек створений для того щоб якщо наприклад є багато об'єктів одного і того ж класу
// то можна його звідти взяти або створити такий якщо його досі немає
error_reporting(E_ALL);
ini_set('display_errors', 1);


class poolSingle
{
    /**
     * @var array
     */
    public static  $arr_objects = [];

    /**
     * @param string $obj_name
     */
    public function setObject(string $obj_name){

        self::$arr_objects[$obj_name] = new self();
    }

    /**
     * @param string $obj_name
     * @return mixed
     */
    public function getObject(string $obj_name){

        if(!isset(self::$arr_objects[$obj_name])){
            $this->setObject($obj_name);
        }
        return self::$arr_objects[$obj_name];
    }
}



$new_object = new poolSingle();
$new_object->getObject('Petro');
$new_object->getObject('Ihor');
var_dump(poolSingle::$arr_objects)

?>