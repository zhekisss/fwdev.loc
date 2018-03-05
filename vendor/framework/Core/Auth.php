<?php

namespace Vendor\Core;
use Vendor\Helper\Session;

class Auth implements AuthInterface
{
        
    public $authorized = false;
    protected $user;
    protected $passwordHashed;
    protected $password;
    protected $hash;
    
    public function __construct()
    {
    }
    
    // public function is_authorized()
    // {
    //     return $this->authorized;
    // }
    
    public function authorize($user)
    {
        Session::set('auth_authorized', true);
        Session::set('auth_user', true);
        Session::set('user_name', $user);
    }
    
    public function unAuthorize()
    {
        // Session::delete('auth_authorized');
        // Session::delete('auth_user');
        setSession(session_name(), session_id(), time()-60*60*24);
        session_destroy();
    }
    
    /**
     * Password Verify
     *
     * @param string $password
     * @return boolean
     */
    public function encryptPassword($password, $passwordHash)
    {   
        return password_verify($password, $passwordHash);
    }

    public function hashUser()
    {
        return Session::get('auth_user');
    }

    public function passwordHash($pass)
    {
        return password_hash(trim($pass), 1);
    }
}