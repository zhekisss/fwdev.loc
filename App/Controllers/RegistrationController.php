<?php

namespace App\Controllers;

class RegistrationController extends AppController
{
      public function __construct(){
        parent:__construct($route);
      }

      public indexAction()
      {
        echo "string";
      }

      public failedAction()
      {
        echo "string";
      }

      public successAction()
      {
        echo "string";
      }

      public function validate()
      {
        return true;
      }

}
