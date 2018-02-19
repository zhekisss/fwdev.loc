<?php

namespace Vendor\Core;

/**
 * Вспомогательный класс
 */
class Ajax
{
    public static function is_ajax()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}