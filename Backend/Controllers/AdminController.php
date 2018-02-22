<?php

namespace Backend\Controllers;

use Vendor\Core\Base\Controller;


/**
 * Главный контроллер админской части сайта
 */
class AdminController extends Controller
{

    public function __construct($route)
    {
        
       parent::__construct($route);
    }

    public function indexAction()
    {
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));
    }

    public function logoutAction()
    {
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));
    }
}