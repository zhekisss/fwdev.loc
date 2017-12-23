<?php

namespace App\Controllers;

class PostsNew extends App
{
    public function indexAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'index'";
    }

    public function testAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'test'";
    }

    public function testNewPageAction()
    {
        echo "Создан объект класса " . __CLASS__ . " и выполнен метод 'testNewPage'";
    }
}