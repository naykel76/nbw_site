<?php

use App\Http\Controllers\TestingController;
use App\Http\Controllers\Uni\Uni2701Controller;
use App\Http\Livewire\Dev\{Choices, Select};
use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    Auth::loginUsingId(1);
    return view('pages.home');
})->name('home');

Route::get('/dev', [TestingController::class, 'timer'])->name('dev');

(new RouteBuilder('nav-main'))->create();

(new RouteBuilder('nav-angular', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-concepts', 'components.layouts.docs-blog-style'))->create();
(new RouteBuilder('nav-ionic', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-javascript', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-laravel', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-linux', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-livewire', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default')) ->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default'))->create();
