<?php

namespace Backend\Models;

use Vendor\Core\Base\Model;

class Login extends Model
{
    use ModelTrait;

    protected $table = 'user';
    public $user;
}
