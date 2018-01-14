<?php
use Vendor\Core\Router;

// Router::add('^page/(?P<action>[a-z-]+)$', ['controller' => 'page']);
// Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'page' , 'action' => 'view']);
Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');