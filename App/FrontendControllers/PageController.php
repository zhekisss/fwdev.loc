<?php

namespace App\FrontendControllers;

class PageController extends AppController
{

    public $layout = '';

    public function indexAction()
    {
        // echo "Создан объект класса " . __class__ . " и выполнен метод " . __METHOD__;
        // debug($this->route);
    }

    public function viewAction()
    {

        $link = $this->route['alias'];
// var_dump(\R::testConnection());
        //if ($page = \R::findOne('page', 'link = ?', [$link])) {
        //    $this->set(compact('page'));
        //    return true;
        //} else {
        //    return false;
        //}
    }

    public function testAction()
    {

    }
}