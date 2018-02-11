<?php

namespace Vendor\libs\Classes;


class Helper {

    public static function is_ajax()
    {

        // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        //     /* special ajax here */
        //  return true;
        // } else {
        //     return false;
        // }

        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ? true : false ;
        
    }
}