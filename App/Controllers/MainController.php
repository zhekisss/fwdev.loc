<?php

namespace App\Controllers;

use App\Models\Main;
use Vendor\Core\Registry;

class MainController extends AppController
{
    
    public $model;
    
    public function __construct($route)
    {
        $this->model = new Main();
        \R::dispense('page');
        parent::__construct($route);
    }
    
    public $cache;
    
    public function indexAction()
    {
        $menuOptions = [];
        
        $cacheMenu = $this->reg->get('cache');
        $menu =  $cacheMenu->get('menu');
        $menu = (string) $this->reg->get('menu', $menuOptions);

        $cachePost = $this->reg->get('cache');
        $posts =  $cachePost->get('posts');
        
        if (!$posts || !$menu) {
            $posts = \R::findAll('page', 'LIMIT 2');
            
            $postsArr = $this->bean2Arr($posts);
            
         
            $cachePost->set('posts', $posts);
            
        }
        
        $method = $this->methodName(__class__, __FUNCTION__);
        $title = 'MAIN TITLE';
        $this->set(compact('title', 'posts', 'postsArr', 'menu'));
        return true;
    }
    
    public function testAction()
    {
        
        if ($this->is_ajax()) {
            
            \R::dispense('page');
            $post = $this->reg->cache->get('post');
            $post = false;
            
            if (!$post) {
                
                $postArr = \R::findOne('page', "id={$_POST['id']}")->export();
                // $postArr = $post->export();
                $this->reg->cache->set('post', $post);
                
            }
            $postArr['title'] = '<i>JSON object</i>';
            
            // $postArr['reg'] = $this->reg->getList();
            $postArr = json_encode($postArr);
            $this->set(compact('postArr'));
            
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
    
    public function bean2Arr($posts)
    {
        $count = 0;
        foreach ($posts as $post) {
            $count++;
            $postsArr[] = $post->export();
        }
        if ($count === 1) {
            $postsArr = $postsArr[0];
        }
        return $postsArr;
    }
}