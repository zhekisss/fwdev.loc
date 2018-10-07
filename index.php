<?php
/**
 * Класс для измерения времени выполнения скрипта или операций
 */
class Timer
{
    /**
     * @var float время начала выполнения скрипта
     */
    private static $start = .0;

    /**
     * Начало выполнения
     */
    public static function start()
    {
        self::$start = microtime(true);
    }

    /**
     * Разница между текущей меткой времени и меткой self::$start
     * @return float
     */
    public static function finish()
    {
        return microtime(true) - self::$start;
    }
}

$pass = 'mail@mail.ru123456789';

$passHashed = password_hash($pass, PASSWORD_BCRYPT);
echo $passHashed;
