<?php

namespace Vendor\Core\Base;

class Di
{
    /**
    *  массив
    *  @var array
    */
    public $container = [];
    
    /**
    * Установить зависимость
    * возвращает объект
    * @param $key
    * @param $value
    * @return $this
    */
    public function set($key, $value)
    {
        $this->container[$key] = $value;
        return $this;
    }
    
    /**
    * Взять зависимость
    *
    * @param $key
    * @return mixed
    */
    public function get($key)
    {
        return $this->has($key);
    }
    
    /**
    * Проверка ключа
    *
    * @param mixed $key
    * @return mixed
    */
    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null ;
    }
}