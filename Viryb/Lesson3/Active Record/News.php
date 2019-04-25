<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.09.17
 * Time: 15:12
 */

class News extends Model
{
    /**
     * Load news by id
     *
     * @param $id
     * @return $this
     */
    public function load($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM news WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            try{
            $result->execute();
            $this->data = $result->fetch();
            }catch(PDOException $e){
                echo "Can't load data from DB: ". $e->getMessage();
            }
        }

        return $this;
    }

    /**
     * Update news by id
     *
     * @param $id
     * @return $this
     */
    protected function update($id)
    {
        $id = intval($id);
        if($id){

                $db = Db::getConnection();
                $sql = 'UPDATE news SET title = :title, date = :date, short_content = :short_content, content = :content, author_name = :author_name'.
                    'WHERE id = :id';
                $result = $db->prepare($sql);
                $result->bindParam(':title', $this->getDataByKey('title'), PDO::PARAM_STR);
                $result->bindParam(':date', $this->getDataByKey('date'), PDO::PARAM_STR);
                $result->bindParam(':short_content', $this->getDataByKey('short_content'), PDO::PARAM_STR);
                $result->bindParam(':content', $this->getDataByKey('content'), PDO::PARAM_STR);
                $result->bindParam(':author_name', $this->getDataByKey('author_name'), PDO::PARAM_STR);
            try{
                $result->execute();

            }catch(PDOException $e){
                echo "Some wants wrong =): ". $e->getMessage();
            }
        }
        return $this;
    }

    /**
     * Insert new news
     *
     * @return $this
     */
    protected function insert()
    {

            $db = Db::getConnection();
            $sql = 'INSERT INTO news(title, date, short_content, content, author_name)'
            .' VALUES(:title, :date, :short_content, :content, :author_name)';
            $result = $db->prepare($sql);
            $result->bindParam(':title', $this->getDataByKey('title'), PDO::PARAM_STR);
            $result->bindParam(':date', $this->getDataByKey('date'), PDO::PARAM_STR);
            $result->bindParam(':short_content', $this->getDataByKey('short_content'), PDO::PARAM_STR);
            $result->bindParam(':content', $this->getDataByKey('content'), PDO::PARAM_STR);
            $result->bindParam(':author_name', $this->getDataByKey('author_name'), PDO::PARAM_STR);
        try{
            $result->execute();
            $this->data['id'] = $db->lastInsertId();
        }catch (PDOException $e){
            echo "Insert query can't be done". $e->getMessage();
        }

        return $this;
    }

    /**
     * Save news
     *
     * @return bool
     */
    public function save()
    {
        if (empty($this->getDataByKey('id'))) {
            $this->insert();
        } else {
            $this->update($this->getDataByKey('$id'));
        }
    }

    /**
     * Delete news
     *
     * @param $id
     * @return $this
     */
    public function delete($id)
    {
        $id = intval($id);
        if($id){
            $db = Db::getConnection();
            $sql = 'DELETE FROM news WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            try {
                $result->execute();
            }catch (PDOException $e){
                echo "Can't delete record :".$e->getMessage();
            }
            $this->data = [];
            header("Location: /news");

            return $this;
        }
    }
}
