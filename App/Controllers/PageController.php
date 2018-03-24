<?php

namespace App\Controllers;

class PageController extends AppController
{

    public function indexAction()
    {
        $posts = false;
        $cachePost = $this->reg->get('cache');
        $posts = $cachePost->get('posts');

        if (!$posts ?? null) {
            $posts = \R::findAll('page');

            $postsArr = $this->bean2Arr($posts);

            $cachePost->set('posts', $posts);
        }
        $page = new \StdClass;
        $page->title = 'Страницы';
        
        
        $this->set(compact('page', 'posts', 'postsArr'));
    
    }

    public function viewAction()
    {

        $link = $this->reg->get('str')->translit($this->route['alias']);

        $cachePage = $this->reg->get('cache');
        
        if($page = $cachePage->get($link)){
            $this->set(compact('page'));
        } elseif ($page = \R::findOne('page', 'WHERE link=?', [$link])) {
            $this->set(compact('page'));
            $cachePage->set($link, $page);
        } else {
            return false;
        }
    }

    public function testAction()
    {

    }
}