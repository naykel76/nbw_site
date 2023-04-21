<?php

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

(new RouteBuilder('nav-main'))->create();
(new RouteBuilder('nav-programming', 'layouts.docs-default'))->create();

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
