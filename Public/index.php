<?php

session_start();
date_default_timezone_set('Asia/Yekaterinburg');

// Require composer autoload
require_once "../vendor/autoload.php";
require_once '../vendor/framework/libs/functions.php';

//Получение запроса из адресной строки браузера
$query = strtolower(rtrim($_SERVER['QUERY_STRING'], '/'));

// Проверка первого слова из строки браузера до символа "/"
list($env) = explode('/', $query);


// Проверка окружения - "admin" или "user"
if ($env !== 'admin') {
    require_once  '../config/config_main.php';
    require_once APP . '/app.php';

// Подключение админки
} else {
    require_once  '../config/back_conf.php';
    require_once APP . '/admin.php';
}