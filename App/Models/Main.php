<?php

namespace App\Models;

use Vendor\Core\Base\Model;

class Main extends Model
{
    public $table = 'page';

    public function _construct()
    {
        \R::dispense($this->table);
    }
}