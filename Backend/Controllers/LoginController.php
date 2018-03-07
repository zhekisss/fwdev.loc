<?php

namespace Backend\Controllers;

use Vendor\Helper\Request;
use Vendor\Helper\Redirect;
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
        $session = $request->session['falseLogin'] ?? null;
        Session::delete('falseLogin');
        $this->set(compact('session', 'index'));

    }

    public function LoginActionAction()
    {
        $request = new Request;
        $params = $request->post;
        $auth = $this->authAdmin($params);
        if (!$auth) {
            Redirect::run('login');
        } elseif ($auth) {
            Redirect::run('admin');
            exit;
        } else {
            Redirect::run('login');
            exit;
        }
    }

    public function authAdmin($params)
    {
        \R::dispense('user');
        $query = \R::find('user', "WHERE `name` = '{$params['name']}' LIMIT 1")[1] ?? null;
        // $query = is_array($query) ?: $query[1]->export();

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
        } else {
            Session::set('falseLogin', '<p>Неверный адрес эелектронной почты или пароль.</p>');
            return false;
        }
        Session::set('falseLogin', '<p>Заполните все поля.</p>');
        return false;
    }
}
