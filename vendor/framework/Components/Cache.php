<?php

namespace Vendor\Components;

class Cache
{

    public function __construct()
    {

    }

    public function set($key, $data, $time = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $time;
        if (file_put_contents(CACHE . '/' . md5($key) . '.txt', base64_encode(serialize($content)))) {
            return true;
        } else {
            return false;
        }
    }

    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(base64_decode(file_get_contents($file)));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function del($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
            return true;
        }
        return false;
    }
}