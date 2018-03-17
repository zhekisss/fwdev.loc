<?php

namespace App\Models;

use Vendor\Core\Base\Model;

class Main extends Model
{
    public $table = 'main_pages';

    public function _construct()
    {
        \R::dispense($this->table);
    }
}