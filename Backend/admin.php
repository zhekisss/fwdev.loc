<?php
use Vendor\Core\Router;

require_once 'routes.php';

try {
    Router::dispatch($query);
} catch (Exception $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}