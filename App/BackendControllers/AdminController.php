<?php

namespace App\BackendControllers;

use \Vendor\Core\Base\Controller;

class AdminController extends Controller
{
    
    public function __construct($route)
    {
        // $this->route = $route;

       parent::__construct($route);
    }
}