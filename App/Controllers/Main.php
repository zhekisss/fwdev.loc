<?php

namespace App\Controllers;

class Main extends App
{
    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод " . __METHOD__;
    }
    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод " . __METHOD__;
    }
}