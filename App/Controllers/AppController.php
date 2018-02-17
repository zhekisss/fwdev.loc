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
        'ajax' => 'data',
        'function' => 'test'
        ];
    }
}