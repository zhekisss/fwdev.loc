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
    static function start()
    {
        self::$start = microtime(true);
    }

    /**
     * Разница между текущей меткой времени и меткой self::$start
     * @return float
     */
    static function finish()
    {
        return microtime(true) - self::$start;
    }
}

var_dump(filter_list());
$var = 'zhekisssmail.ru';
$email = filter_var( $var ,FILTER_VALIDATE_EMAIL);
echo $email;