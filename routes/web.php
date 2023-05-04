<?php

use App\Http\Controllers\Uni\Uni2701Controller;
use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// must run first
(new RouteBuilder('nav-main'))->create();

(new RouteBuilder('nav-laravel', 'layouts.docs-default'))->create();
(new RouteBuilder('nav-programming', 'layouts.docs-default'))->create();

Route::get('/2701', [Uni2701Controller::class, 'show'])->name('uni.2701');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

// (new RouteCreator('nav-admin'))->create();

// Route::middleware(['role:super|admin', 'auth'])->prefix('admin')->name('admin')->group(function () {
//     Route::view('/', 'gotime::admin.dashboard'); // admin dashboard
// });
