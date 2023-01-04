<?php

namespace App\Http\Controllers;

use App\Helpers\AntiSpamFilter;
use App\Helpers\HeaderLogger;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    /**
     * Authenticates the given user.
     */
    public function authenticate(Request $request, Response $response)
    {
        $headerOrder = json_encode(array_keys(getallheaders()));

        if (AntiSpamFilter::areTooManyFailedAttempts($headerOrder)) {
            return view('logged-in');
        }

        $email = $request->get('email');
        $password = $request->get('password');

        if ($email === 'admin@example.com' && $password === 'admin') {
            $timestamp = time();
            $age = 60 * 60 * 24 * 365;

            $response->header("Set-Cookie", "session=$timestamp; Path=/; Max-Age=$age; Secure; HttpOnly; SameSite=Strict");

            return view('logged-in');
        } else {
            HeaderLogger::logHeaderOrderToAuthLog($headerOrder);

            return redirect()->route('auth', array('state' => 'rejected'), 302, array('cache-control' => 'no-cache'));
        }
    }

    public function register(Request $request, Response $response)
    {
        return view('registered');
    }
}
