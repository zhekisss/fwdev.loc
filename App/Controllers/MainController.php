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
        $this->reg->menu = 'Vendor\\Widgets\\Menu\\Menu';
    }

    public $cache;

    public function indexAction()
    {


        
        // $posts = $this->reg->cache->get('posts');
        // if (!$posts) {
        $posts = \R::findAll('page', 'LIMIT 2');

        $postsArr = $this->bean2Arr($posts);

        $this->reg->cache->set('posts', $posts);
        $menu =  $this->reg->menu->setProp([
            'tpl'       => www . '/menu/my_menu.php',
            'container' => 'ul',
            'tabble'    => 'categories',
            'cache'     => 60
        ]);

        // }
            
        // $model = new Main;
        // $posts = $model->findAll();

        // $posts = $model->rb::findAll();

        // $posts2 = $model->findAll();
        // $posts = $model->findOne('Здесь инки не приставали', 'name');
        // $posts = $model->findBySql("SELECT * FROM {$model->table} WHERE content LIKE ?",['%пасх%']);
        // $posts = $model->findLike('пасх', 'content', 'page');

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

                $post = \R::findOne('page', "id={$_POST['id']}");
                $postArr = $post->export();
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
