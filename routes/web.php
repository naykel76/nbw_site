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
    return view('pages.home');
})->name('home');

Route::get('/dev', [TestingController::class, 'timer'])->name('dev');

(new RouteBuilder('nav-angular', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-concepts', 'components.layouts.docs-blog-style'))->create();
(new RouteBuilder('nav-ionic', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-javascript', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-laravel', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-linux', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-main'))->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default')) ->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default'))->create();

Route::get('/2701', [Uni2701Controller::class, 'show'])->name('uni.2701');

// Route::get('/docs/laravel/components-and-integrations', Choices::class)
//     ->name('docs.laravel.choices');

// Route::get('/docs/laravel/select', Select::class)
//     ->name('docs.laravel.select');
