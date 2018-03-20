<?php

namespace Backend\Controllers;

use Vendor\Helper\Redirect;
use Vendor\Helper\Session;

/**
 * Вход в админ панель
 */
class LoginController extends AdminController
{
    public $layout = 'main';
    public $view;
    public $model;

    public function __construct($route)
    {
        parent::__construct($route, false);
    }

    public function indexAction()
    {
        $message = Session::get('falseLogin') ?? null;
        Session::delete('falseLogin');
        $this->set(compact('message'));
    }

    public function LoginActionAction()
    {
        $params = $this->reg->get('req')->post;
        $auth = $this->authAdmin($params);
        if (!$auth) {
            Redirect::run('login');
            exit;
        } elseif ($auth) {
            Redirect::run('admin');
            exit;
        } else {
            Redirect::run('login');
            exit;
        }
    }

    /**
     * Метод для обработки данных формы авторизации
     * Авторизация админа
     */
    private function authAdmin($params)
    {
        $this->model->getUser($params);
        $query = $this->model->user;

        $emailPass = isset($params['email']) ? $params['email'].$params['password'] : false;
        $queryEmailPass = isset($query->password) ? $query->password : false;

        if (!empty($query)) {
            $user = $query->name;
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
