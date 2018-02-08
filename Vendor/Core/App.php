<?php

namespace Vendor\Core;

use Vendor\Core\Registry;

class App
{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::getInstance();
    }

}