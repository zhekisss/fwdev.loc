<?php

namespace Backend\Controllers;

use Vendor\Core\Base\Controller;


/**
 * Главный контроллер админской части сайта
 */
class AdminController extends Controller
{

    protected $auth = false;

    public function __construct($route)
    {
        echo __CLASS__;
        
        parent::__construct($route);
        if (!$this->auth && __CLASS__ === 'Backend\Controllers\AdminController'){
            header('Location:/admin/login/');
            exit;
        }
        
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