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
        $request = new Request;
        $index = 'Класс: ' . __class__ . '<br> Метод: ' . __FUNCTION__;
        $session = $request->session['badPassword'];
        $this->set(compact('session', 'index'));
    }

    public function formLoginAction()
    {
        $request = new Request;
        $params = $request->post;
        $auth = $this->authAdmin($params);
        if ($auth) {
            header('Location: /admin/login');
            exit;
        } elseif ($auth) {
            header('Location: /admin');
        } else {
            header('Location: /admin/login');
            exit;
        }
    }

    public function authAdmin($params)
    {

        // \R::findOne('page', "id={$_POST['id']}")->export();

        \R::dispense('user');
        $query = \R::findAll('user', "WHERE `name` = \"{$params['name']}\" LIMIT 1")[1] ?? false;

        $emailPass = isset($params['email']) ? $params['email'] . $params['password'] : false;
        $queryEmailPass = isset($query['password']) ? $query['password'] : false;

        if (!empty($query)) {
            $user = $query['name'];

            if ($query['role'] === 'admin') {
                if ($this->auth->encryptPassword($emailPass, $queryEmailPass)) {
                    $this->auth->authorize($user);
                    Session::set('badPassword', '');
                    return true;
                } else {
                    Session::set('badPassword', 'Incorrect email or password.');
                    return false;
                }
            }
        }
        Session::set('badPassword', 'Incorrect email or password.');
        return false;
    }
}