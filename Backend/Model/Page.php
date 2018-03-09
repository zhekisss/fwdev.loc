<?php

namespace Backend\Model;

use Vendor\Core\Base\Model;


class Page extends Model
{

    public function __construct($table = null)
    {
        $this->table = $table ?? 'page';
        parent::__construct();
        \R::dispense($this->table);
    }

    public function getPages()
    {
         return \R::findAll($this->table, "ORDER BY `link`");
    }

    public function editPage($link)
    {
        $page = \R::findOne($this->table, '`link`=?', [$link]);
         return $page;
    }

    public function savePage()
    {
        
    }
}