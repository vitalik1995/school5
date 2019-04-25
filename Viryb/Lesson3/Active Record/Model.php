<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.11.17
 * Time: 15:18
 */

abstract class Model implements ModelInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setDataByKey($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getDataByKey($key)
    {
        return $this->data[$key];
    }

    /**
     * @param $id
     * @return mixed
     */
    abstract public function load($id);

    /**
     * @return mixed
     */
    abstract public function save();

    /**
     * @return mixed
     */
    abstract protected function insert();

    /**
     * @param $id
     * @return mixed
     */
    abstract protected function update($id);

    /**
     * @param $id
     * @return mixed
     */
    abstract public function delete($id);

}
