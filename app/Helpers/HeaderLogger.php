<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class HeaderLogger
{
    static function logHeaderOrderToAuthLog($headerOrder)
    {
        $content = "{$_SERVER['REQUEST_TIME']};;;failed;;;$headerOrder" . PHP_EOL;

        $storage = Storage::disk('local');

        if (!$storage->exists('authlog')) {
            $storage->makeDirectory('authlog');
        }

        $storage->append('authlog/log.out', $content);
    }
}
