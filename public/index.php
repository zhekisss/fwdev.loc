<?php
// Seeeion start
session_start();

// Require composer autoload
require_once "../vendor/autoload.php";

// Определение каталога с ядром на основе настроек из composer.json
$composerJson = json_decode(file_get_contents('../composer.json'));
$require = $composerJson->autoload;
foreach ($require as $key => $values) {
    foreach ($values as $value => $prop) {
        if ($value === 'Vendor\\') {
            define('CORE', $prop);
        } else {
            continue;
        }
    };
};


use Vendor\Core\Router;

//Получение запроса из адресной строки браузера
$query = strtolower(rtrim($_SERVER['QUERY_STRING'], '/'));

// Проверка первого слова из строки браузера до символа "/"
list($env) = explode('/', $query);

// Проверяем что первое слово равно "admin", если да то загружаем настройки для админ части сайта
require_once $env == "administrator" ? '../config/back_conf.php' : '../config/config_main.php';

// Сканирует папку с библиотеками функций и подключает их
$libs = scandir('../' . CORE . '/libs');
foreach ($libs as $key) {
    if (is_file('../vendor/framework/libs/' . $key)) {
        switch ($key) {
            case '.':
                continue;
            case '..':
                continue;
            default:
                require_once '../vendor/framework/libs/' . $key;
        }
    }
}

// Фунция автолоада без композера (не используется)
function autoload($class)
{
    $file = ROOT . '/' . str_replace('\\', '/', $class . '.php');
    !is_file($file) ? : require_once $file;
}

// spl_autoload_register(function ($class) {
    //     autoload($class);
    // });
    
    // new App;

// Проыерка окружения - "admin" или "user"
if (ENV !== 'admin') {

    require_once APP . "/routes.php";

    try {
        Router::dispatch($query);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

// Подключение админки
} else {

    require_once APP . '/admin.php';

}