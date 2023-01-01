<?php
ini_set('display_errors', 1);

$page = file_get_contents('auth.html');

define('LOGPATH', 'authlog/log.out');
define('ATTEMPTS', 3);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $headerOrder = json_encode(array_keys(getallheaders()));

    if (areTooManyFailedAttempts($headerOrder)) {
        echo file_get_contents('logged-in.html');
        exit;
    }

    if ($email === 'admin@example.com' && $password === 'admin') {
        $timestamp = time();
        $age = 60 * 60 * 24 * 365;

        header("Set-Cookie: session=$timestamp; Path=/; Max-Age=$age; Secure; HttpOnly; SameSite=Strict");

        echo file_get_contents('logged-in.html');
    } else {
        logHeaderOrderToAuthLog($headerOrder);

        echo str_replace('%error_state%', '', $page);
    }
} else {
    echo str_replace('%error_state%', 'hidden', $page);
}

function logHeaderOrderToAuthLog($headerOrder)
{
    $pointer = fopen(LOGPATH, 'a');

    fwrite($pointer, "{$_SERVER['REQUEST_TIME']};;;failed;;;$headerOrder" . PHP_EOL);
    fclose($pointer);
}

function areTooManyFailedAttempts($headerOrder)
{
    if (!file_exists(LOGPATH)) {
        return false;
    }

    $content = file_get_contents(LOGPATH);

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

    return sizeof($filtered) > ATTEMPTS;
}
