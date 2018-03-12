<?php

namespace Backend\Controllers;

use Vendor\Core\Base\Controller;
use Vendor\Core\Auth;
use Backend\Model\Admin;
use Vendor\Helper\Session;
use Vendor\Helper\Redirect;



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
        if (method_exists($this, $route['action'] . 'Action')) {
            $this->db = new Admin;
            $this->auth = new Auth();
            parent::__construct($route);
            $auth = $this->auth->authorized;
            if (!$this->auth->authorized && $redirect) {
                Redirect::run('login');
                exit;
            }
        }
    }

    public function indexAction()
    {
        $index = 'Класс: ' . __class__ . '<br> Метод: ' . __FUNCTION__;
        $message = '<h2>Вы авторизованы!!!<h2>';
        $this->set(compact('index', 'message'));
    }

    public function logoutAction()
    {
        $this->view = '';
        $auth = new Auth;
        $auth->unAuthorize();
        Redirect::run('login');
        exit;
    }
}