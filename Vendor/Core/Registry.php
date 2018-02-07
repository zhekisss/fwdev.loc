<?php

namespace Vendor\Core;

class Registry
{

    public static $objects = [];

    private static $instance = null;

    private function __construct($config)
    {
        if (isset($config['components'])) {
            foreach ($config['components'] as $name => $component) {
                self::$objects[$name] = new $component;
            }
        }
    }

    static public function getInstance($config = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($config);
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
        echo '<pre>' . var_dump(self::$objects) . '</pre>';
    }
}