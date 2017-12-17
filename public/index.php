<?php

use Vendor\Core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

// require_once '../vendor/core/router.php';
require_once '../Vendor/libs/functions.php';
// require_once '../app/controllers/Main.php';
// require_once '../app/controllers/Posts.php';
// require_once '../app/controllers/PostsNew.php';

function autoload($class){
    $file = ROOT . '/' . str_replace('\\','/', $class . '.php');
       
    if(is_file($file)){
        require_once $file;
    } else {
      echo 'File ' . $file . ' not found';
    }
}

spl_autoload_register(function($class){
    autoload($class);
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);


Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// echo Router::matchRoute($query) ? debug(Router::getRoute()) :  '404';

Router::dispatch($query);