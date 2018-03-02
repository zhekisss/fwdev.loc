<?php

namespace Vendor\Helper;

class Request{
    
    /**
    *
    * @var array
    */
    public $get = [];
    
    /**
    *
    * @var array
    */
    public $post = [];
    
    /**
    *
    * @var array
    */
    public $request = [];
    
    /**
    *
    * @var array
    */
    public $cookie = [];
    
    /**
    *
    * @var array
    */
    public $files = [];
    
    /**
    *
    * @var array
    */
    public $server = [];
    
    public $session = [];
    
    public function __construct(){
        
        $this->get      = $_GET;
        $this->post     = $_POST;
        $this->request  = $_REQUEST;
        $this->cookie   = $_COOKIE;
        $this->files    = $_FILES;
        $this->server   = $_SERVER;
        $this->session  = $_SESSION;
        
    }
    
    public function session($key)
    {
        if (isset($this->session[$key])) {
            return $this->session[$key];
        } else{
            return false;
        };
    }
}