<?php

namespace App\FrontendControllers;

use App\Models\Main;
use Vendor\Core\Registry;

class MainController extends AppController
{
    public $layout = 'main';

    public $sidebar = 'главное меню';

    public function indexAction()
    {

        $model = new Main();
        \R::dispense('page');
        $posts = $this->reg->cache->get('posts');
        if (!$posts) {
        $posts = \R::load('page', 2);
        $this->reg->cache->set('posts', $posts);
        }

        $sidebar = $this->getSideBar($this->sidebar);

        // $model = new Main;
        // $posts = $model->findAll();

        // $posts = $model->rb::findAll();

        // $posts2 = $model->findAll();
        // $posts = $model->findOne('Здесь инки не приставали', 'name');
        // $posts = $model->findBySql("SELECT * FROM {$model->table} WHERE content LIKE ?",['%пасх%']);
        // $posts = $model->findLike('пасх', 'content', 'page');

        $title = 'MAIN TITLE';
        $this->set(compact('title', 'posts', 'sidebar'));
        return true;
    }

    public function testAction()
    {

        if ($this->is_ajax()) {

            $model = new Main();
            \R::dispense('page');
            $post = $this->reg->cache->get('post');
            $post = false;

            if (!$post) {
                
                $post = \R::findOne('page', "id={$_POST['id']}");
                $postArr = $post->export();
                $this->reg->cache->set('post', $post);

            }
            $postArr['title'] = '<i>JSON object</i>';
            $postArr['img'] = '<img src="http://lorempixel.com/800/400" height=300 width=400>';
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
}
