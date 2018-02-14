<?php

namespace App\FrontendControllers;

use \Vendor\Core\Base\Сontroller;

class AppController extends Сontroller
{
    public $reg;
    
    public function __construct($route)
    {
        
        parent::__construct($route);
    }
    
    public function getSideBar($sidebar)
    {
        return '<h1>' . $sidebar . '<h1>';
    }
    
    public function ajax()
    {
        $ajaxArray = [
        'ajax' => 'data',
        'function' => 'test'
        ];

                
    }
}