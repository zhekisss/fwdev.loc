<?php

namespace App\Models;

use \Vendor\Base\Model;

class Main extends \Vendor\Core\Base\Model
{
    public $table = 'page';

    public function _construct()
    {
        \R::dispense($this->table);
    }
}