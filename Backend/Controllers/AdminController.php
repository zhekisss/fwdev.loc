<?php

namespace Backend\Controllers;

use Vendor\Core\Base\Controller;
use Vendor\Core\Auth;
use Backend\Model\Admin;
use Vendor\Helper\Session;



/**
 * Главный контроллер админской части сайта
 */
class AdminController extends Controller
{

    protected $authorized = false;
    protected $auth;
    protected $db;

    public function __construct($route, $redirect = true)
    {
        $this->db = new Admin;
        $this->auth = new Auth();
        parent::__construct($route);
        $auth = $this->auth->authorized;
        if (!$this->auth->authorized && $redirect){
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