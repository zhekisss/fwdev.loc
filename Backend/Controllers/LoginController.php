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
        $errMessage = $request->session['falseLogin'] ?? '';
        $index = 'Класс: ' . __class__ . '<br> Метод: ' . __FUNCTION__;
        $this->set(compact('index', 'errMessage'));
        Session::set('falseLogin', '');

    }

    public function LoginActionAction()
    {
        $request = new Request;
        $params = $request->post;

        empty($params['name']) && empty($params['email']) && empty($params['password']) ? Session::set('falseLogin', '<p style="color:red">Пожалуйста, заполните все поля формы.</p>') : $this->authAdmin($params);
        header('Location: /admin');
        exit;
    }

    public function authAdmin($params)
    {
        \R::dispense('user');
        $query = \R::findAll('user', "WHERE `name` = '{$params['name']}' LIMIT 1")[1]->export();


        $emailPass = isset($params['email']) ? $params['email'] . $params['password'] : false;
        $queryEmailPass = isset($query['password_hash']) ? $query['password_hash'] : false;

        if (!empty($query)) {
            $user = $query['name'];

            if ($query['role'] === 'admin') {
                if ($this->auth->encryptPassword($emailPass, $queryEmailPass)) {
                    $this->auth->authorize($user);
                    Session::set('falseLogin', '');
                    return true;
                } else {
                    Session::set('falseLogin', '<p>Неверный адрес эелектронной почты или пароль.</p>');
                    return false;
                }
            }
        }

        Session::set('falseLogin', '<p>Неверный адрес эелектронной почты или пароль.</p>');
        return false;
    }
}