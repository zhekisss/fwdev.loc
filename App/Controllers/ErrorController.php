<?php

namespace App\Controllers;

use Vendor\Core\Base\Controller;

/**
 * Вызов страницы 404
 */
class ErrorController extends Controller
{
    public $query;

    public function __construct()
    {
        global $query;
        $this->query = $query;

        $this->layout = '';

        $route = [
            'controller' => 'Error',
            'action' => 'index'
        ];

        parent::__construct($route);
    }

    public function indexAction()
    {        
        $query = $this->query;
        $title = 'ERROR 404';
        $this->set(compact('query', 'title'));
        http_response_code(404);
    }
}
