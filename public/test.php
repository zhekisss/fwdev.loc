<?php

 require_once'rb-mysql.php';
 $db = require_once '../config/config_db.php';
 
 $options = [
     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];
    
    R::setup($db['dsn'], $db['user'], $db['pass'] , $options);
    R::fancyDebug('true');

//  var_dump(R::testConnection());

// $category = R::dispense('category');

// $category->title = 'news';

// $id = R::store($category);

R::trash('category');

