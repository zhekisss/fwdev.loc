<?php

use Vendor\Core\Router;

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'page' , 'action' => 'view']);
Router::add('^posts/(?P<alias>[a-z-]+)$', ['controller' => 'posts' , 'action' => 'view']);
Router::add('^$', ['controller' => 'main', 'action' => 'index']);