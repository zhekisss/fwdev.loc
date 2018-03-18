<?php

namespace Backend\Models;

use Vendor\Core\Base\Model;

class Page extends Model
{
    use ModelTrait;

    public function __construct($table = null)
    {
        $this->table = $table ?? 'page';
        parent::__construct();
        \R::dispense($this->table);
    }
}
