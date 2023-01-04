<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AntiSpamFilter
{
    static function areTooManyFailedAttempts($headerOrder)
    {
        $storage = Storage::disk('local');

        if (!$storage->exists('authlog/log.out')) {
            return false;
        }

        $content = $storage->get('authlog/log.out');

        $lines = explode(PHP_EOL, $content);

        $entries = array_map(function ($line) {
            $values = array_values(explode(';;;', $line, 3));

            if (sizeof($values) !== 3) {
                return (object) [
                    'timestamp' => 0,
                    'state' => 'unknown',
                    'headerOrder' => '[UNDECLARED]'
                ];
            }

            return (object) [
                'timestamp' => (int)$values[0],
                'state' => $values[1],
                'headerOrder' => $values[2]
            ];
        }, $lines);

        $now = time();

        $filtered = array_filter($entries, function ($entry) use ($now, $headerOrder) {
            return $now - $entry->timestamp < 10 && $entry->headerOrder === $headerOrder;
        });

        return sizeof($filtered) > 2;
    }
}
