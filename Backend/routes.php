<?php

use Vendor\Core\Router;

Router::add('^admin$', ['controller' => 'admin', 'action' => 'index']);
Router::add('^admin/(?P<action>[a-z-]+)$', ['controller' => 'page']);

// Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
// Router::add('^page$', ['controller' => 'page', 'action' => 'index']);
// Router::add('^admin/(?P<alias>[a-z-]+)$', ['controller' => 'admin' , 'action' => 'index']);
// Router::add('^posts/(?P<alias>[a-z-]+)$', ['controller' => 'posts' , 'action' => 'view']);
// Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');