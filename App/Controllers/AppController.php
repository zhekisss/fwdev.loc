<?php

namespace App\Controllers;

use Vendor\Core\Base\Controller;

/**
 * Общий контроллер для фроненд части сайта
 */
class AppController extends Controller
{
    public $reg;

    public $ajax = false;

    public $layout = 'main';
    
    public function __construct($route)
    {
        $this->ajax = $this->is_ajax();
        
        parent::__construct($route);
    }
    
    public function ajax()
    {
        $ajaxArrayConf = [
        'ajax'      => 'data',
        'function'  => 'test'
        ];

        
    }

    /**
     * Возвращает форматированную строку с именем класса и метода, в котором выполнена функция
     *
     * @param string $class
     * @param string $function
     * @return string
     */
    public function methodName($class = __CLASS__, $function = __FUNCTION__)
    {
        return 'Class: ' . $class . "\n<br> Method: " . $function;
    }
}