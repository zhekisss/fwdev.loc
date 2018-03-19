<?php

namespace Vendor\Helper;

/**
 * Вспомогательный класс для работы с массивом $_SESSION
 */
class Session
{

    /**
     *
     * @param $key
     * @param $value
     * @param int $time
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     *
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Удаляет элемент массива 'session' по ключу
     * @param $key
     */
    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}
