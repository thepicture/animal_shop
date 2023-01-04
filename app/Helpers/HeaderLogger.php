<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class HeaderLogger
{
    static function logHeaderOrderToAuthLog($headerOrder)
    {
        $content = "{$_SERVER['REQUEST_TIME']};;;failed;;;$headerOrder";

        $storage = Storage::disk('local');

        $storage->append('authlog/log.out', $content);
    }
}
