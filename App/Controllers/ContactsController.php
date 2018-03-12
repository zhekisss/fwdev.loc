<?php

namespace App\Controllers;

class ContactsController extends AppController
{
    public function indexAction()
    {
        $index = $this->methodName(__CLASS__,__FUNCTION__);
        $this->set(compact('index'));
    }
}