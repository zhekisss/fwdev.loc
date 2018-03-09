<?php

namespace App\Controllers;

use App\Models\Page;

class PageController extends AppController
{

    public function indexAction()
    {
        echo "Создан объект класса " . __class__ . " и выполнен метод " . __METHOD__;
    }

    public function viewAction()
    {
        $model = new Page;
        $link = $this->route['alias'];

        if ($page = \R::findOne('page', 'WHERE link=?', [$link])) {
            $this->set(compact('page'));
        } else {
            return false;
        }
    }

    public function testAction()
    {

    }
}