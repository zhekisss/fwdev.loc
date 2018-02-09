<?php

namespace App\Controllers;

use \Vendor\Core\Base\Сontroller;
use Vendor\Core\App;

class AppController extends Сontroller
{
    public $reg;

    public function __construct($route)
    {
        $this->reg = new App;
        parent::__construct($route);
    }

    public function getSideBar($sidebar)
    {
        return '<h1>' . $sidebar . '<h1>';
    }
}