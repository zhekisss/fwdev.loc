<?php
use Vendor\Core\Router;
use Vendor\Core\Registry;
use Vendor\Core\App;
require_once 'routes.php';

try {
    Router::dispatch($query);
} catch (Exception $e) {
    echo $e->getMessage();
}