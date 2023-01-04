<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Helpers\AntiSpamFilter;
use App\Helpers\HeaderLogger;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', function () {
    return view('auth');
});

Route::get('auth', function () {
    return view('auth');
})->name('auth');

Route::post('auth', [UserController::class, 'authenticate']);
