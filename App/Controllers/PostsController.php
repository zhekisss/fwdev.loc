<?php

namespace App\Controllers;

class PostsController extends AppController
{
    // public $route = [];
    public $layout = 'main';
    
    public function __construct($route)
    {
        // $this->route = $route;

       parent::__construct($route);
    }

    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
        return true;
    }
    
    public function testAction()
    {
        
    }

    public function testPageAction()
    {
        
    }

    public function before()
    {
        echo 'Оппаньки';
    }
}