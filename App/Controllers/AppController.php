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
            $this->getWidgets('menu');
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

    public function getWidgets($name)
    {
        $cache = $this->reg->get('cache');
        $widget = $cache->get($name);
        if (!$widget) {
            $widget = (string)$this->reg->get($name);
            $cache->set($name, $widget);
        }
        $this->vars[$name] = $widget;
    }
}
