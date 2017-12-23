<?php

namespace App\Controllers;

class Page extends App
{
    public function viewAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'view'";
        debug($this->route);
    }
    
    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'test'";
        debug($this->route);
    }
}