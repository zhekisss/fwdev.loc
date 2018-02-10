<?php

namespace Vendor\Core\Base;

use Vendor\Core\Base\View;
use Vendor\Core\Db;
use Vendor\Core\Registry;

abstract class Сontroller
{
    public $rb;

    /**
     * Путь
     *
     * @var array
     */
    public $route = [];

    /**
     * Вид
     *
     * @var string
     */
    public $view;

    /**
     * Шаблон
     *
     * @var string
     */
    public $layout;

    /**
     * Переменные в вид
     * пользовательские данные
     *
     * @var array
     */
    public $vars;

    public $reg;

    public function __construct($route)
    {
        $this->reg = Registry::getInstance();
        $this->reg->helper = 'Vendor\libs\Classes\Helper';
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars = $vars;
    }
}
