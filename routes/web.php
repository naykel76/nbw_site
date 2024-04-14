<?php

use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-main'))->create();

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Route::redirect('/', '/dev');

// Route::get('/dev', function () {
//     return view('dev');
// })->name('dev');



