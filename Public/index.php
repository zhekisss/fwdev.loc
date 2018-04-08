<?php

use Vendor\Core\ErrorHandler;



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
    unset($env);
    require_once  '../config/config_main.php';
    // $errorHandler = new ErrorHandler();
    require_once APP . '/app.php';

    // Подключение админки
} else {
    unset($env);
    require_once  '../config/back_conf.php';
    // $errorHandler = new ErrorHandler();
    require_once APP . '/admin.php';
}
