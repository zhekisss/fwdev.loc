<?php

namespace Vendor\Helper;

class Redirect
{
    public static function run($value, $code = '200', $message = 'OK')
    {
        switch ($value) {
            case 404:
                header("HTTP/1.0 404 Not Found");
                exit;

            case 'login':
                header('Location: /admin/login');
                exit;

            case 'logout':
                header('Location: /admin/logout');
                exit;
            case 'admin':
                header('Location: /admin');
                exit;
            case 'page':
                header('Location: /admin/page');
                exit;

            default:
                header("{$value} {$code} {$message}");
                exit;

        }
    }
}
