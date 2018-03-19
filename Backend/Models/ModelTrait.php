<?php

namespace Backend\Models;

trait ModelTrait
{
    public function __construct($table = null)
    {
        $this->table = $table ?? 'page';
        parent::__construct();
        \R::dispense($this->table);
    }

    public function getPages()
    {
        return \R::findAll($this->table, 'ORDER BY `time`');
    }

    public function getPageByID($id)
    {
        return \R::load('post', $id);
    }

    public function edit($link)
    {
        return \R::findOne($this->table, '`link`=?', [$link]);
    }

    public function save($params)
    {
        // $page = \R::dispense($this->table);
        $page = \R::load($this->table, $params['id']);
        $page->title = $params['title'];
        $page->content = $params['content'];
        \R::store($page);
    }

    public function getUser($params)
    {
        $this->user = \R::findOne('user', 'WHERE `name` = ?', [$params['name']]) ?? null;
    }
}
