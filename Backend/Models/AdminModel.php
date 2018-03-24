<?php

namespace Backend\Models;

use Vendor\Core\Base\Model;

class AdminModel extends Model
{
    public function __construct($table = null)
    {
        $this->table = $table ?? 'page';
        parent::__construct();
        \R::dispense($this->table);
    }

    public function get()
    {
        return \R::findAll($this->table, 'ORDER BY `time`');
    }

    public function getPageByID($id)
    {
        return \R::load($this->table, $id);
    }

    public function getPageByLink($link)
    {
        return \R::findOne($this->table, '`link`=?', [$link]);
    }

    public function edit($id)
    {

        $page = $this->getPageById($id);
        return $page;
    }

    public function save($params)
    {
        $page = \R::load($this->table, $params['id']);
        $page->title = $params['title'];
        $page->content = $params['content'];
        $page->link = $params['link'];
        \R::store($page);
    }

    public function getUser($params)
    {
        $this->user = \R::findOne('user', 'WHERE `name` = ?', [$params['name']]) ?? null;
    }

    public function del($id)
    {
      $page = $this->getPageById($id);
      \R::trash($page);
    }
}
