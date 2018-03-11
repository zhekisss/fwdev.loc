<?php

namespace Backend\Model;

trait ModelTrait
{
    public function getPages()
    {
        return \R::findAll($this->table, 'ORDER BY `link`');
    }

    public function edit($link)
    {
        $page = \R::findOne($this->table, '`link`=?', [$link]);

        return $page;
    }

    public function save($params = [])
    {
        \R::dispense($this->table);
    }

    public function getUser($params)
    {
        $this->user = \R::findOne('user', 'WHERE `name` = ?', [$params['name']]) ?? null;
    }
}
