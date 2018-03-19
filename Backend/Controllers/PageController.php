<?php

namespace Backend\Controllers;

use Backend\Model\Page;

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
        $params = $this->reg->get('req')->post;
        $this->model->save($params);        
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
