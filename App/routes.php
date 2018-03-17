<?php

use Vendor\Core\Router;

$routes = [
    0 => [
        'path' => 'vendor',
        'controller' => 'main',
        'action' => 'view',
        'alias' => 'vendor'
    ],
    1 => [
        'path' => 'public',
        'controller' => 'main',
        'action' => 'view',
        'alias' => 'piblic'
    ],
    2 => [
        'path' => 'contacts',
        'controller' => 'main',
        'action' => 'view',
        'alias' => 'contacts'
    ]
];

foreach ($routes as $route){
    $path = $route['path'];
    $controller = $route['controller'];
    $action = $route['action'];
    $alias = $route['alias'];
    Router::add("^$path$", ["controller" => $controller , "action" => $action, "alias" => $alias]);
}

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'page' , 'action' => 'view']);
Router::add('^posts/(?P<alias>[a-z-]+)$', ['controller' => 'posts' , 'action' => 'view']);
Router::add('^$', ['controller' => 'main', 'action' => 'index']);