<?php

$config = [
    'components' => [
        'cache' => 'Classes\Cache',
        'test' =>  'Classes\Test'
    ]
];

function autoload($class)
{
    $file = str_replace('\\', '/', $class . '.php');
    !is_file($file) ? : require_once $file;
}

spl_autoload_register(function ($class) {
    autoload($class);
});


class Registry
{

    public static $objects = [];

    private static $instance = null;

    private function __construct()
    {
        global $config;

        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __set($key, $object)
    {
        self::$objects[$key] = isset(self::$objects[$key]) ?: new $object;
    }

    public function __get($key)
    {
         if (isset(self::$objects[$key])) {
             return is_object(self::$objects[$key]) ? self::$objects[$key] : 'false' ;
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

$app = Registry::getInstance();

$app->test;

$app->cache;

$app->getList();

$app->test2 = 'Classes\Test2';

var_dump($app->test2);

$app->getList();

$app->test2->echoHello();