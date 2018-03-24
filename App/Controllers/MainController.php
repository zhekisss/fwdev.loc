<?php

namespace App\Controllers;

use App\Models\Main;

class MainController extends AppController
{
    public $model;

    protected $cache;

    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        $menuOptions = [];

        $cacheMenu = $this->reg->get('cache');

        $menu = $cacheMenu->get('menu');
        $menu = (string) $this->reg->get('menu', $menuOptions);
        $posts = false;
        $cachePost = $this->reg->get('cache');
        // $posts = $cachePost->get('posts');

        if (!$posts ?? null) {
            $posts = \R::findAll('page');

            $postsArr = $this->bean2Arr($posts);

            $cachePost->set('posts', $posts);
        }

        $page = new \StdClass;
        $page->title = 'MAIN';
        $this->set(compact('posts', 'postsArr', 'form', 'page'));
    }

    public function testAction()
    {
        if ($this->is_ajax()) {
            \R::dispense('page');
            $post = $this->cache->get('post');

            if (!$post) {
                $post = \R::findOne('page', "id={$_POST['id']}")->export();

                $this->cache->set('post', $post);
            }

            $this->set(compact('post'));
        } else {
            $title = 'MAIN TITLE';
            $this->set(compact('title'));
            $this->view = 'test';
        }
    }

    public function viewAction()
    {
        $this->view = $this->route['alias'] ?? '';
        $link = $this->route['alias'];

        if ($page = \R::findOne('main_pages', 'WHERE link=?', [$link])) {
            $this->set(compact('page'));
        } else {
            return false;
        }
    }
}
