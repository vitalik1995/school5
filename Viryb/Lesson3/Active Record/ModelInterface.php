<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.11.17
 * Time: 15:16
 */

interface ModelInterface
{
    /**
     * @param $kay
     * @param $value
     * @return mixed
     */
    public function setDataByKey($kay, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function getDataByKey($key);

    /**
     * @return mixed
     */
    public function save();

    /**
     * @param $id
     * @return mixed
     */
    public function load($id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
