<?php
session_start();
$previousID = session_name('framework_php');

require_once "../vendor/autoload.php";

use Vendor\Core\Router;

$query = strtolower(rtrim($_SERVER['QUERY_STRING'], '/'));

list($env) = explode('/', $query);

require_once $env == "admin" ? '../config/back_conf.php' : '../config/config_main.php';

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
    
    // new App;

    if(ENV !== 'admin') {
    
        require_once APP . "/routes.php";
        
        try {
            Router::dispatch($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        
    } else {

    require_once APP . '/admin.php';

    }