<?php

namespace App\Services\Singleton\SharedData;

class SharedData
{
    protected static $data;

    public static function setData($data)
    {
        self::$data = $data;
    }

    public static function getData()
    {
        return self::$data;
    }
} 

