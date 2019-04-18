<?php
//Singleton призначений для створення лише одного об'єкта класу , використовується у випадках коли є загроза
//кількох об'єктів , найчастіше використовуєтується для підключення до бази даних
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Singletone
{
    /**
     * @var null
     */
    private static $db = null;

    /**
     * @return null|PDO
     */
    public static function getConnection()
    {
        $params = ['host' => "localhost",
            'dbname' => "phpshop",
            'user' => "root",
            'password' => "root",];

        if(self::$db === null) {
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            self::$db = new PDO($dsn,$params['user'],$params['password']);
            echo"first initialization";
        }else{
            echo "NOT first initialization";
        }
        return self::$db;
    }

    /**
     * Singletone constructor.
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     *
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}

class Categories
{
    /**
     * @var null|PDO
     */
    private $_db = null;

    /**
     * @var array
     */
    private $categoryList = [];

    /**
     * Categories constructor.
     */
    public function __construct()
    {
        $this->_db = Singletone::getConnection();
    }

    /**
     * @return array
     */
    public function getAllCategories()
    {
        $result = $this->_db->query('SELECT id, name FROM category ORDER BY sort_order ASC;');
        $i = 0;

        while ($row=$result->fetch())
        {
            $this->categoryList[$i]['id'] = $row['id'];
            $this->categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $this->categoryList;
    }
}

$categories = new Categories();
$second = new Categories();
$third = new Categories();
var_dump($third->getAllCategories())
?>