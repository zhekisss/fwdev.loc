<?php

use Vendor\Core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/Vendor/Core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/App');
define('LAYOUT', 'default');

require_once '../Vendor/libs/functions.php';

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

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
// Router::add('^page/(?P<action>[a-z-]+)$', ['controller' => 'page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'page' , 'action' => 'view']);
Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// echo Router::matchRoute($query) ? debug(Router::getRoute()) :  '404';

Router::dispatch($query);