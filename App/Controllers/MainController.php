<?php

namespace App\Controllers;

use App\Models\Main;
use Vendor\Core\Registry;

class MainController extends AppController
{

    public $model;

    protected $cache;

    public function __construct($route)
    {
        $this->model = new Main();        
        parent::__construct($route);
        $this->cache = $this->reg->get('cache');
    }

    public function indexAction()
    {
        $menuOptions = [];

        $cacheMenu = $this->reg->get('cache');
        
        $menu = $cacheMenu->get('menu');
        $menu = (string)$this->reg->get('menu', $menuOptions);

        $cachePost = $this->reg->get('cache');
        $posts = $cachePost->get('posts');

        if (!$posts) {
            $posts = \R::findAll('page');

            $postsArr = $this->bean2Arr($posts);


            $cachePost->set('posts', $posts);

        }

        $method = $this->methodName(__class__, __FUNCTION__);
        $title = 'MAIN TITLE';
        $this->set(compact('title', 'posts', 'postsArr', 'menu', 'form'));
        
    }

    public function testAction()
    {

        if ($this->is_ajax()) {

            \R::dispense('page');
            $post = $this->cache->get('post');

            if (!$post) {

                $post = \R::findOne('page', "id={$_POST['id']}")->export();
                // $postArr = $post->export();
                $this->cache->set('post', $post);

            }
            
            $this->set(compact('post'));

        } else {

            $title = 'MAIN TITLE';
            $this->set(compact('title'));
            $this->view = 'test';

        };
    }

    public function viewAction(Type $var = null)
    {
        $this->view = '';
        echo 'qwerty';
    }
}