<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

require_once '../vendor/core/router.php';
require_once '../vendor/libs/functions.php';

Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z]+)/?(?P<action>[a-z-]+)?$');

// echo Router::matchRoute($query) ? debug(Router::getRoute()) :  '404';

Router::dispatch($query);