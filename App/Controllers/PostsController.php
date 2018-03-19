<?php

namespace App\Controllers;

class PostsController extends AppController
{

    public function __construct($route)
    {

       parent::__construct($route);
    }

    public function indexAction()
    {
      $index = "Класс __CLASS__";
      $this->set(compact('index'));
    }
}
