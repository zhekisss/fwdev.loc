<?php

namespace Vendor\Core;

interface Auth
{

    /**
     * Авторизация
     *
     * @return boolean
     */
    public function authorized();
    
    /**
     * Проверка авторизован ли пользователь
     *
     * @param string $user
     * @return boolean
     */
    public function authorize($user);
        
    /**
     * Logout
     *
     * @return boolean
     */
    public function unAuthorize();

    /**
     * Проверка хэша пароля
     *
     * @param string $password
     * @return void
     */
    public function encryptPassword($password, $passwordHash);
    

    public function hashUser();
    
}

