<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31.10.17
 * Time: 20:54
 */

class ObjectPool
{
    /**
     * @var array
     */
    private $instances = [];

    /**
     * Get object form pool
     *
     * @param $key
     *
     * @return User
     */
    public function getObject($key)
    {
        if(isset($this->instances[$key])) {

            return $this->instances[$key];
        }

        return $this->instances[$key] = new User();
    }

    /**
     * Add object to pool
     *
     * @param $object
     * @param $key
     *
     * @return bool
     */
    public function addObjectToPool($object, $key)
    {
        if($this->instances[$key] === $object){

            return false;
        }

        return $this->instances[$key] = $object;
    }
}
