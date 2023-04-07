<?php

namespace App\Lib;

use Hyperf\Utils\ApplicationContext;

class Redis
{
    public static function get()
    {
        $container = ApplicationContext::getContainer();
        return $container->get(\Hyperf\Redis\Redis::class);
    }
}