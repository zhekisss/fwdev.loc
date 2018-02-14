<?php

namespace Vendor\Core;

class Registry  
{

    public static $objects = [];

    private static $instance = null;

    private function __construct()
    {

        $config = require_once ROOT . "/config/config.php";

        if (isset($config['components'])) {
            foreach ($config['components'] as $name => $component) {
                self::$objects[$name] = new $component;
            }
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __set($key, $object)
    {
        self::$objects[$key] = isset(self::$objects[$key]) ? : new $object;
    }

    public function __get($key)
    {
        if (isset(self::$objects[$key])) {
            return is_object(self::$objects[$key]) ? self::$objects[$key] : 'false';
        }
    }

    public function __wakeup()
    {
    }

    private function __clone()
    {
    }

    public function getList()
    {
        return '<pre>' . var_dump(self::$objects) . '</pre>';
    }
}