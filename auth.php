<?php
$page = file_get_contents('auth.html');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === 'admin@example.com' && $password === 'admin') {
        echo file_get_contents('logged-in.html');
    } else {
        echo str_replace('%error_state%', '', $page);
    }
} else {
    echo str_replace('%error_state%', 'hidden', $page);
}
