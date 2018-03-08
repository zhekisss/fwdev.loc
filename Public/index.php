<?php
// Seeeion start
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
// Require composer autoload
require_once "../vendor/autoload.php";

//Получение запроса из адресной строки браузера
$query = strtolower(rtrim($_SERVER['QUERY_STRING'], '/'));

// Проверка первого слова из строки браузера до символа "/"
list($env) = explode('/', $query);

// Проверяем что первое слово равно "admin", если да, то загружаем настройки для админ части сайта
require_once $env == "admin" ? '../config/back_conf.php' : '../config/config_main.php';

// Сканирует папку с библиотеками функций и подключает их
// $libs = scandir('../' . CORE . '/libs');
// foreach ($libs as $key) {
//     if (is_file('../vendor/framework/libs/' . $key)) {
//         switch ($key) {
//             case '.':
//                 continue;
//             case '..':
//                 continue;
//             default:
//                 require_once '../vendor/framework/libs/' . $key;
//         }
//     }
// }

// Проверка окружения - "admin" или "user"
if (ENV !== 'admin') {
    require_once APP . '/app.php';

// Подключение админки
} else {
    require_once APP . '/admin.php';
}