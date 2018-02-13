<?php

class Cache
{

    public function __construct()
    {

    }

    public function set($key, $data, $time = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $time;
        if (file_put_contents(CACHE . '/' . md5($key . '.txt', serialize($content)))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get()
    {

    }

    public function del()
    {

    }
}