<?php

namespace App\Controllers;

class MainController extends AppController
{

    public $layout = 'main';

    public function indexAction()
    {
        // echo "Создан объект класса " . __CLASS__ . " и выполнен метод " . __METHOD__;
        // $this->layout = 'main';
        // $this->view = 'index';

        $name = 'Vasya';
        $colors = [
            'white' => 'белый',
            'black' => 'черный'
        ];
        $vars = compact("name", "colors");
        
        $this->set($vars);
    }

    public function testAction()
    {
        $this->layout = 'test';
        $this->view = 'test';
    }
}