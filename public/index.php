<?php

use Vendor\Core\Router;
use App\Controllers\ErrorController;
session_start();
$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/Vendor/Core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/App');
define('LAYOUT', 'default');

require_once '../Vendor/libs/functions.php';

function autoload($class){
    $file = ROOT . '/' . str_replace('\\','/', $class . '.php');
    !is_file($file)?: require_once $file;
}

spl_autoload_register(function($class){
    autoload($class);
});

require_once APP . "/routes.php";

Router::dispatch($query);