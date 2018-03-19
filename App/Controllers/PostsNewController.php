<?php

namespace App\Controllers;

class PostsNewController extends AppController
{

    public function indexAction()
    {
        $this->view = 'page';
        $index = "Создан объект класса " . __CLASS__ . " и выполнен метод ";
        $this->set(compact('index'));
    }

    public function testAction()
    {
    }

    public function testNewPageAction()
    {
    }
}
