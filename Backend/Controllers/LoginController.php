<?php

namespace Backend\Controllers;

use Vendor\Helper\Request;
use Vendor\Helper\Redirect;
use Vendor\Helper\Session;

/**
 * [LoginController description]
 */
class LoginController extends AdminController
{
    public $layout = 'main';
    public $view;
    protected $model;

    public function __construct($route)
    {
        parent::__construct($route, false);
    }

    /**
    * [indexAction description]
    * @return [type] [description]
    */
    public function indexAction()
    {
        $request = new Request();
        $index = 'Класс: '.__CLASS__.'<br> Метод: '.__FUNCTION__;
        $session = $request->session['falseLogin'] ?? null;
        Session::delete('falseLogin');
        $this->set(compact('session', 'index'));
    }


    /**
    *  Метод для обработки данных формы авторизации
    **/
    public function LoginActionAction()
    {
        $params = $this->reg->get('req')->post;
        // $params = $request->post;
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
     * [authAdmin description]
     * @param  [array] $params [description]
     * @return [type]         [description]
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
