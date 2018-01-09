<?php

namespace App\Controllers;

use App\Models\Main;

class MainController extends AppController
{
    
    public $layout = 'main';
    
    public function indexAction()
    {
        $model = new Main;
        $posts = $model->findAll();
        // $posts2 = $model->findAll();
        // $posts = $model->findOne('Здесь инки не приставали', 'name');
        // $posts = $model->findBySql("SELECT * FROM {$model->table} WHERE content LIKE ?",['%пасх%']);
        // $posts = $model->findLike('пасх', 'content', 'page');
        $title = 'MAIN TITLE';
        $this->set(compact('title','posts'));
    }
    
    public function testAction()
    {
        $title = 'MAIN TITLE';
        $this->set(compact('title'));
        $this->view = 'test';
    }
}