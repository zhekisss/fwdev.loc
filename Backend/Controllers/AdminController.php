<?php

namespace Backend\Controllers;

use Vendor\Core\Auth;
use Vendor\Core\Base\Controller;
use Vendor\Helper\Redirect;

/**
 * Главный контроллер админской части сайта
 */
class AdminController extends Controller
{
    protected $authorized = false;
    protected $auth;

    public function __construct($route, $redirect = true)
    {

        if (method_exists($this, $route['action'] . 'Action')) {
            $this->auth = new Auth();
            parent::__construct($route);
            $auth = $this->auth->authorized;
            $this->setTitle();
            if (!$this->auth->authorized && $redirect) {
                Redirect::run('login');
                exit;
            }
        }
    }

    public function indexAction()
    {
        $message = 'Вы авторизованы';
        $this->setVar('message',$message);
    }

    public function logoutAction()
    {
        $this->view = '';
        $auth = new Auth;
        $auth->unAuthorize();
        Redirect::run('login');
        exit;
    }

    public function setTitle()
    {
        $page = new \StdClass;
        $page->title = 'Добро пожаловать!';
        $this->setVar('page', $page);
    }
}
