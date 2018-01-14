<?php

use Vendor\Core\Router;
// use App\Controllers\ErrorController;

session_start();

$query = rtrim($_SERVER['QUERY_STRING'], '/');

require_once '../config/config_main.php';

$libs = scandir('../Vendor/libs');

foreach($libs as $key){

    switch ($key) {
        case '.'    : continue;
        case '..'   : continue;
        default     : require_once '../Vendor/libs/' . $key;
    }
}

function autoload($class){
    $file = ROOT . '/' . str_replace('\\','/', $class . '.php');
    !is_file($file)?: require_once $file;
}

spl_autoload_register(function($class){
    autoload($class);
});

require_once APP . "/routes.php";

Router::dispatch($query);