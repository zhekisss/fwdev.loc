<?php

namespace App\Controllers;

class Posts
{
    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
    }
    
    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'test'";
    }

    public function testPageAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'testPage'";
    }

    public function before()
    {
        echo 'Оппаньки';
    }
}