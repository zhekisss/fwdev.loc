<?php

namespace Backend\Controllers;

class PageController extends AdminController
{
    public function __construct($route)
    {
        
        $this->view = 'default';
        $this->layout = 'main';

        parent::__construct($route);
    }

    public function indexAction()
    {
        
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));

    }

    public function userAction()
    {
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));
    }
}