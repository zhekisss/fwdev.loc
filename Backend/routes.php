<?php

use Vendor\Core\Router;

Router::add('^admin/logout$', ['controller' => 'admin', 'action' => 'logout']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^admin/page/(?P<alias>[a-z-0-9-а-я]+)$', ['controller' => 'page' , 'action' => 'view']);
Router::add('^admin$', ['controller' => 'admin', 'action' => 'index']);
