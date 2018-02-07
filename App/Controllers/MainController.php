<?php

namespace App\Controllers;

use App\Models\Main;
use Vendor\Core\Registry;
// use Vendor\Core\App;

class MainController extends AppController
{
    public $layout = 'main';
   
    public function indexAction()
    {

        $model = new Main();
        \R::dispense('page');
        // $posts = R::load('page','1');
        $posts = \R::findAll('page');
        $this->reg::$app->getList();
        $this->reg::$app->test->go();
        $this->reg::$app->cache->go();

        // $model = new Main;
        // $posts = $model->findAll();

        // $posts = $model->rb::findAll();

        // $posts2 = $model->findAll();
        // $posts = $model->findOne('Здесь инки не приставали', 'name');
        // $posts = $model->findBySql("SELECT * FROM {$model->table} WHERE content LIKE ?",['%пасх%']);
        // $posts = $model->findLike('пасх', 'content', 'page');
        $title = 'MAIN TITLE';
        $this->set(compact('title', 'posts'));
        return true;
    }

    public function testAction()
    {
        $title = 'MAIN TITLE';
        $this->set(compact('title'));
        $this->view = 'test';
    }

    public function viewAction(Type $var = null)
    {
        echo 'qwerty';
    }
}
