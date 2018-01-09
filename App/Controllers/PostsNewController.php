<?php

namespace App\Controllers;

class PostsNewController extends AppController
{
    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
        debug($this->route);
    }

    public function testAction()
    {
        
    }

    public function testNewPageAction()
    {
        
    }
}