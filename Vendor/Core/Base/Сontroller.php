<?php

namespace Vendor\Core\Base;

use Vendor\Core\Base\View;

abstract class Сontroller
{
    
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];        
    }

    public function getView()
    {
        $vObj = new View($this->route,$this->layout,$this->view);
        $vObj->render();
    }
}