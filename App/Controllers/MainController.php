<?php

namespace App\Controllers;

use App\Models\Main;

class MainController extends AppController
{
    
    public $layout = 'main';
    
    public function indexAction()
    {
        $model = new Main;
        // $res = $model->query("CREATE TABLE `page` SELECT * FROM project_cms.page");
        $posts = $model->findAll();
        var_dump($posts);
        $title = 'MAIN TITLE';
        $this->set(compact("title"));
    }
    
    public function testAction()
    {
        $this->layout = 'test';
        $this->view = 'test';
    }
}