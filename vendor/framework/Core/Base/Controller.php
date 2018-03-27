<?php

namespace Vendor\Core\Base;

use Vendor\Core\Registry;

/**
 * Родительский контроллер приложения
 *
 */
abstract class Controller
{
    public $rb;

    /**
     * Путь.
     *
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     *
     * @var string
     */
    public $view;

    /**
     * Шаблон.
     *
     * @var string
     */
    public $layout = 'main';

    /**
     * Переменные в вид,
     * пользовательские данные.
     *
     * @var array
     */
    public $vars;

    /**
     * Registry.
     *
     * @var object
     */
    public $reg;

    /**
     * Текущая модель
     */
    public $model;

    public function __construct($route)
    {
        // Проверка существования метода (Action`а) в созданном экземпляре класса 'Controller'
        if (method_exists($this, $route['action'].'Action')) {
            $classModel = NAME_SPACE . "Models\\" . $route['controller'];
            // Создание объекта модели по имени контроллера
            $this->model = class_exists($classModel) ? new $classModel : null;
            $this->reg = Registry::getInstance();
            $this->route = $route;
            $this->view = $route['action'];
        }
    }

    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars[] = $vars;
    }

    protected function is_ajax()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->layout = 'ajax';
            $this->view = '';

            return true;
        }

        return false;
    }

    protected function bean2Arr($posts)
    {
        if (!empty($posts)) {
            $count = 0;
            foreach ($posts as $post) {
                ++$count;
                $postsArr[] = $post->export();
            }
            if ($count === 1) {
                $postsArr = $postsArr[0];
            }

            return $postsArr;
        }

        return null;
    }

    public function setVar($var, $value)
    {
        $this->vars[$var] = $value;
    }
}
