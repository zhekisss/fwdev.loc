<?php

namespace Backend\Controllers;

use Vendor\Helper\Request;
use Vendor\Helper\Session;

class LoginController extends AdminController
{
    public $layout = 'main';
    public $view;

    public function __construct($route)
    {
        parent::__construct($route, false);
    }

    public function indexAction()
    {

        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        $this->set(compact('index'));

    }

    public function formLoginAction()
    {
        $request = new Request;
        $params = $request->post;
        $this->authAdmin($params);
        header('Location: /admin');
    }
    
    public function authAdmin($params)
    {

        // \R::findOne('page', "id={$_POST['id']}")->export();

        \R::dispense('user');
        $query = \R::findAll('user', "WHERE `name` = \"{$params['name']}\" LIMIT 1");
        $query = $query[1]->export();

        $emailPass = isset($params['email']) ? $params['email'] . $params['password'] : false;
        $queryEmailPass = isset($query['password']) ? $query['password'] : false;

        if (!empty($query)) {
            $user = $query['name'];

            if ($query['role'] === 'admin') {

                if ($this->auth->encryptPassword($emailPass, $queryEmailPass)) {

                    $this->auth->authorize($user);
                    Session::set('badPassword', '');

                    header("Location: /admin/login/");
                    exit;

                } else {
                    Session::set('badPassword', 'Incorrect email or password.');
                    header('Location: /admin/login/');
                    exit;
                }
            }
        }

        Session::set('badPassword', 'Incorrect email or password.');
        header('Location: /admin/login/');
        exit;
    }
}