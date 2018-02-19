<?php

namespace App\Controllers;

use Vendor\Core\Base\Controller;

class AppController extends Controller
{
    public $reg;

    public $layout = 'main';
    
    public function __construct($route)
    {
        
        parent::__construct($route);
    }
    
    public function ajax()
    {
        $ajaxArray = [
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