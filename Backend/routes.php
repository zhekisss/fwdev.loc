<?php

use Vendor\Core\Router;

Router::add('^administrator$', ['controller' => 'admin', 'action' => 'index']);
Router::add('^administrator/logout$', ['controller' => 'admin', 'action' => 'logout']);
Router::add('^administrator/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
// Router::add('^admin/(?P<controller>[a-z-]+)$', ['action' => 'index']);
// Router::add('^admin/page/(?P<action>[a-z-]+)$', ['controller' => 'page']);
// Router::add('^admin/post/(?P<action>[a-z-]+)$', ['controller' => 'post']);

// Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
// Router::add('^page$', ['controller' => 'page', 'action' => 'index']);
// Router::add('^admin/(?P<alias>[a-z-]+)$', ['controller' => 'admin' , 'action' => 'index']);
// Router::add('^posts/(?P<alias>[a-z-]+)$', ['controller' => 'posts' , 'action' => 'view']);
// Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');