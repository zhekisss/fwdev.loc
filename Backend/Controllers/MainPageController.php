<?php

namespace Backend\Controllers;

use Backend\Model\Page;
use Vendor\Helper\Redirect;
use Vendor\Helper\Session;

class MainPageController extends AdminController
{
    public function __construct($route)
    {
        $this->layout = 'main';
        $this->route = $route;
        parent::__construct($route);
    }

    /**
     * Показывает список страниц
     */
    public function indexAction()
    {
        $pages = $this->model->get();
        $pageExists = Session::get('pageExists');
        Session::set('pageExists', '');
        $this->set(compact('pages', 'pageExists'));
    }

    /**
     * Сохранение отредактированной или вновь созданной страницы
     *
     */
    public function saveAction()
    {
        $this->view = '';
        $req = $this->reg->get('req');
        $params = $req->post;
        $params['link'] = $this->reg->get('str')->translit($params['title']);
        // $params['content'] = str_replace(["\r\n", "\r", "\n"], "<br>", $params['content']);
        $page = $this->model->getPageByLink($params['link']);
        if ($page && $params['action'] === 'new') {
            Session::set('pageExists', '<p class="text-danger"><b>Не возможно создать. Страница с таким названием уже существует.</b></p>');
        } else {
            $this->model->save($params);
        }
        Redirect::run('page');
    }

    /**
     * Создание новой страницы
     */
    public function newAction()
    {
        $this->view = 'edit';
        $action = 'new';
        $this->set(compact('action'));
    }

    /**
     * Редактирование страницы
     */
    public function editAction()
    {
        $page = $this->model->edit($this->reg->get('req')->get['id']);
        $this->reg->get('cache')->del($page->link);
        $this->set(compact('page'));
    }

    public function deleteAction()
    {
        $this->view = '';
        $this->model->del($this->reg->get('req')->get['id']);
        Redirect::run('page');
    }
}
