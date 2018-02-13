<?php
require_once "../vendor/autoload.php";

use Vendor\Core\Router;
use Vendor\Core\Registry;
use Vendor\Core\App;

// use App\Controllers\ErrorController;



session_start();

$query = rtrim($_SERVER['QUERY_STRING'], '/');

require_once '../config/config_main.php';

$libs = scandir('../vendor/Fw/libs');


foreach ($libs as $key) {
    if (is_file('../vendor/Fw/libs/' . $key)){
        switch ($key) {
            case '.':
            continue;
            case '..':
            continue;
            default:
            require_once '../vendor/Fw/libs/' . $key;
        }
    } 
}


function autoload($class)
{
    $file = ROOT . '/' . str_replace('\\', '/', $class . '.php');
    !is_file($file) ? : require_once $file;
}

// spl_autoload_register(function ($class) {
//     autoload($class);
// });

new App;



require_once APP . "/routes.php";

try {
    Router::dispatch($query);
} catch (Exception $e) {
    echo $e->getMessage();
}

