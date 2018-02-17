<?php

namespace Backend\Controllers;

class PostController extends AdminController
{
    public function indexAction()
    {
        $index = 'index';
        $this->set(compact('index'));
    }

    public function userAction()
    {
        $index = 'user';
        $this->set(compact('index'));
    }
}