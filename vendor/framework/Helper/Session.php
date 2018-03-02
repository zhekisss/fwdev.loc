<?php

namespace Vendor\Helper;

/**
 * Вспомогательный класс для работы с массивом $_SESSION
 */
class Session
{

    /**
     * Add cookies
     * @param $key
     * @param $value
     * @param int $time
     */

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get cookies by key
     * @param $key
     * @return null
     */

    public static function get($key)
    {

        if (isset($_SESSION[$key])) {

            return $_SESSION[$key];

        }

        return null;

    }

    /**
     * Delete cookies by key
     * @param $key
     */

    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}
