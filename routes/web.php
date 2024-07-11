<?php

use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-main'))->create();

(new RouteBuilder('nav-angular', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-concepts', 'components.layouts.docs-blog-style'))->create();
(new RouteBuilder('nav-css', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-fundamentals-and-techniques', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-ionic', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-javascript', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-laravel', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-linux', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-livewire', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-react', 'components.layouts.docs-default'))->create();

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/cookbook', function () {
    return view('pages.cookbook');
})->name('cookbook');

// Route::redirect('/', '/dev');
Route::view('/dev', 'dev')->name('dev');
