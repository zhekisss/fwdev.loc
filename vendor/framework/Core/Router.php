<?php

namespace Vendor\Core;

class Router
{
    
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected static $routes = [];

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected static $route = [];

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected static $alias = '';
    
    /**
     * Счетчик итераций цикла поиска подходящего шаблона в методе matchRoute()
     *
     * @var integer
     */
    protected static $patternCount = 0;

    /**
     * Добавляет маршрут согласно шаблону
     *
     * @param string $regexp
     * @param array $route
     * @return void
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает массив маршрутов
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращает массив маршрута
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Выделяет маршрут из url согласно шаблона
     *
     * @param string $url
     * @return boolean
     */
    public static function matchRoute($url)
    {

        if (self::$patternCount > 0) {
            // 
            self::$routes = array_slice(self::$routes, self::$patternCount);
        }
        foreach (self::$routes as $pattern => $route) {
            self::$patternCount++;
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $val) {
                    if (is_string($key)) {
                        $route[$key] = $val;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Вызывает контроллер и экшн согласно маршрута
     *
     * @param string $url
     *
     */
    public static function dispatch($url)
    {
        $env = ENV === "admin" ? "Backend" : "App";
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = "{$env}\\Controllers\\" . self::upperCamelCase(self::$route['controller']) . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . "Action";
                // Проверка существования метода '...Action'
                if (method_exists($cObj, $action)) {
                    if ($cObj->$action() !== false) {
                        $cObj->getView();
                        return true;
                    }else {
                        unset($cObj);
                        self::errorController();
                        return false;
                    }
                    // Если нет '...Action', повторяется исполнение метода 'dispatch' (рекурсивное исполнение метода) 
                    // перебор шаблонов в массиве self::$routes
                } else {
                    if (self::$patternCount > 0) {
                        unset($cObj);
                        self::dispatch($url);
                        return true;
                    }
                }
            }
        }
        self::errorController();
        $count = self::$patternCount;
        return false;
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        // return str_replace(' ', '',ucwords(str_replace('-',' ', $name)));
        return lcfirst(self::upperCamelCase($name));
    }

    public static function removeQueryString($url)
    {
        if ($url) {
            $param = explode('&', $url, 2);
            if (false === strpos($param[0], '=')) {
                return rtrim($param[0], '/');
            } else {
                return '';
            }
        }
    }

    /**
     * Запуск контроллера 404
     *
     * @return void
     */
    public static function errorController()
    {
        $cObj = new \App\Controllers\ErrorController();
        $cObj->indexAction();
        $cObj->getView();
    }
}