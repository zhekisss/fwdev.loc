<?php

namespace App\Controllers;

class Posts extends App
{
    // public $route = [];
    
    public function __construct($route)
    {
        // $this->route = $route;

       parent::__construct($route);
    }

    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
        debug($this->route);
    }
    
    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'test'";
        debug($this->route);
    }

    public function testPageAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'testPage'";
        debug($this->route);
    }

    public function before()
    {
        echo 'Оппаньки';
    }
}