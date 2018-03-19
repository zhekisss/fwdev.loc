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
        $this->model->save();
        $this->set(compact('page'));
    }

    /**
     * Создание новой страницы
     */
    public function newAction()
    {
        $this->view = 'view';
        $this->set(compact('page'));
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
