<?php

namespace Vendor\Core;

class Registry  
{

    public static $objects = [];

    public static $classes = [];

    private static $instance = null;

    private function __construct($selfObjects)
    {

        $config = require_once ROOT . "/config/registry_config.php";

        if (isset($config['components'])) {
            foreach ($config['components'] as $name => $component) {
                self::$objects[$name] = $selfObjects ? new $component : null ;
                self::$classes[$name] = $component;
            }
        }
    }

    static public function getInstance($selfObjects = false)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($selfObjects);
        }

        return self::$instance;
    }

    /**
     * Создает и возвращает объект 
     *
     * @param string $name
     * @return object
     */
    public function get($name, $params = [])
    {
        return isset(self::$classes[$name]) ? new self::$classes[$name]($params) : false;
        // if(isset(self::$classes[$name])){
        //     $object = new self::$classes[$name];
        //     return $object;
        // }
        // return false;
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

    private function __wakeup()
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