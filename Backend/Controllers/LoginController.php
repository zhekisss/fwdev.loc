<?php

namespace Backend\Controllers;

class LoginController extends AdminController
{
    
    public function __construct($route)
    {
        
    }

    public $layout = 'main';

    public function indexAction()
    {
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));

    }

    public function formAction()
    {
        
    }
}