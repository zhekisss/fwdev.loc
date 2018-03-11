<?php

namespace Backend\Model;

use Vendor\Core\Base\Model;

class Login extends Model
{
    use ModelTrait;

    protected $table = 'user';
    public $user;
}
