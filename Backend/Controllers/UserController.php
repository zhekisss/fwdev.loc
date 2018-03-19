<?php

namespace Backend\Controllers;

use Vendor\Core\Base\Controller;

class UserController extends Controller
{
    
    public function indexAction()
    {
        $this->view = '';
        echo __CLASS__;
    }
}
