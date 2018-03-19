<?php

namespace App\Controllers;

use Vendor\Core\Base\Controller;

/**
 * Общий контроллер для фронтенд части сайта.
 */
class AppController extends Controller
{
    public $reg;

    public $ajax = false;

    public $layout = 'main';

    public $view = 'page';

    public function __construct( array $route)
    {
        if (method_exists($this, $route['action'] . 'Action')) {
            parent::__construct($route);
            $this->getWidgets();
        }
    }

    public function ajax()
    {
        $ajaxArrayConf = [
            'ajax' => 'data',
            'function' => 'test',
        ];
    }

    /**
     * Возвращает форматированную строку с именем класса и метода, в котором выполнена функция.
     *
     * @param string $class
     * @param string $function
     *
     * @return string
     */
    public function methodName($class = __class__, $function = __FUNCTION__)
    {
        return 'Class: ' . $class . "\n<br> Method: " . $function;
    }

    public function getWidgets()
    {
        $cacheMenu = $this->reg->get('cache');
        $menu = $cacheMenu->get('menu');
        if (!$menu) {
            $menu = (string)$this->reg->get('menu');
            $cacheMenu->set('menu', $menu);
        }
        $this->vars['menu'] = $menu;
    }
}
