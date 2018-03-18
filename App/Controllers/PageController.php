<?php

namespace App\Controllers;

class PageController extends AppController
{

    public function indexAction()
    {
        $posts = false;
        $cachePost = $this->reg->get('cache');
        // $posts = $cachePost->get('posts');

        if (!$posts ?? null) {
            $posts = \R::findAll('page');

            $postsArr = $this->bean2Arr($posts);

            $cachePost->set('posts', $posts);
        }

        $method = $this->methodName(__class__, __FUNCTION__);
        $title = 'MAIN TITLE';
        $this->set(compact('title', 'posts', 'postsArr', 'form'));
    
    }

    public function viewAction()
    {

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