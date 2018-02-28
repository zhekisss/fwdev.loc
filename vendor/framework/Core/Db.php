<?php

namespace Vendor\Core;

use \R;

class Db
{
    protected $pdo;
    
    protected static $instance;

    public static $countSql = 0;

    public static $queries = [];
    
    
    protected function __construct()
    {
        require_once ROOT . '/' . CORE . '/Core/rb.php';
        $db = require_once ROOT . '/config/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        
        \R::setup($db['dsn'], $db['user'], $db['pass'] , $options);
        
        if (!\R::testConnection()) {
            throw new \Exception('<h1 style="color:red">Ошибка соединения с базой данных</h1>');
        }
        // R::fancyDebug(true);
        // $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'] , $options);
    }
    
    public static function instance()
    {
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    // public function execute($sql, $params = [])
    // {
    //     self::$countSql++;
    //     self::$queries[] = $sql;
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute($params);
    // }
    
    // public function query($sql, $params = [])
    // {
    //     self::$countSql++;
    //     self::$queries[] = $sql;
    //     $stmt = $this->pdo->prepare($sql);
    //     if ($res = $stmt->execute($params)){
    //         return $stmt->fetchAll();
    //     }
    //     return [];
    // }
}