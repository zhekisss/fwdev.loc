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
        $model = new Page();

        $pages = $model->getPages();

        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index', 'pages'));

    }

    public function savepageAction()
    {
        $model = new Page();
        $model->savepage();
        $this->set(compact('page'));
    }

    public function newpageAction()
    {        
        $this->view = 'view';
        // $page = new \stdClass;
        // $page->name = 'Название';
        // $page->content = 'Содержимое';
        // $page->time = date('Y - m - s',time());
        // $page->category = 'Категория';
        $this->set(compact('page'));
    }

    public function viewAction()
    {
        $model = new Page();
        $page = $model->editPage($this->route['alias']);
        $this->set(compact('page'));
    }

    public function userAction()
    {
        $index = 'Класс: ' . __CLASS__ . '<br> Метод: ' . __FUNCTION__;
        
        $this->set(compact('index'));
    }
}