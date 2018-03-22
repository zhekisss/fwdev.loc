<?php

namespace Backend\Controllers;

use Backend\Model\Page;
use Vendor\Helper\Redirect;
use Vendor\Helper\Session;

/**
 * Управление страницами сайта
 */
class PageController extends AdminController
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
        $pages = $this->model->getPages();
        $this->set(compact('pages'));
    }

    /**
     * Сохранение отредактированной или вновь созданной страницы
     */
    public function saveAction()
    {
        $this->view = '';

        $req = $this->reg->get('req');
        $params = $req->post;
        $queryStr = strpos($req->server['HTTP_REFERER'], '/new') ? true : false;
        $params['link'] = $this->reg->get('str')->translit($params['title']);
        if(!$this->model->edit($params['link']) && $queryStr) {
          $this->model->save($params);
        } else {
          Session::set('pageExists','Не возможно создать. Страница с таким названием уже существует.');
        }
        Redirect::run('page');
    }

    /**
     * Создание новой страницы
     */
    public function newAction()
    {
        $this->view = 'edit';
    }

    /**
     * Редактирование страницы
     */
    public function editAction()
    {
        $page = $this->model->edit($this->route['alias']);
        $this->set(compact('page'));
    }
}
