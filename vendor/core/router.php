<?php

class Router
{
    
    protected static $routes = [];
    protected static $route = [];
    
    public static function add($regexp,$route = [])
    {
        self::$routes[$regexp] = $route;
    }
    
    public static function getRoutes()
    {
        return self::$routes;
    }
    
    public static function getRoute()
    {
        return self::$route;
    }
    
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#$pattern#i", $url, $matches)){
                
                foreach($matches as $key => $val){
                    if(is_string($key)){
                        $route[$key] = $val;
                    }
                } 
                if (!isset($route['action'])){
                    $route['action'] = 'index';
                }
                self::$route = $route;
                
                return true;
            }
        }
        return false;
    }
    
    public static function dispatch($url)
    {
        if(self::matchRoute($url)){
            debug(self::$route);
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
}