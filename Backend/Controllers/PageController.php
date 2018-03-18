<?php

namespace Backend\Controllers;

use Backend\Model\Page;

class PageController extends AdminController
{
    public function __construct($route)
    {
        $this->layout = 'main';
        $this->route = $route;
        parent::__construct($route);
    }

    public function indexAction()
    {
        $pages = $this->model->getPages();
        $index = 'Класс: ' . __class__ . '<br> Метод: ' . __FUNCTION__;
        $this->set(compact('index', 'pages'));
    }

    public function saveAction()
    {
        $modelPage = new Page();
        $modelPage->save();
        $this->set(compact('page'));
    }

    public function newAction()
    {
        $this->view = 'view';
        $this->set(compact('page'));
    }

    public function viewAction()
    {
        $model = new Page();
        $page = $model->edit($this->route['alias']);
        $this->set(compact('page'));
    }

    public function userAction()
    {
        $index = 'Класс: ' . __class__ . '<br> Метод: ' . __FUNCTION__;
        $this->set(compact('index'));
    }
}
