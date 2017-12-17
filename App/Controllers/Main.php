<?php

namespace App\Controllers;

class Main
{
    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
    }
    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'test'";
    }
}