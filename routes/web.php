<?php

use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

(new RouteBuilder('nav-alpine', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-gotime', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-jtb', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-laravel', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-livewire', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-main'))->create();
(new RouteBuilder('nav-postit', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs'))->create();
(new RouteBuilder('nav-tutorials', 'components.layouts.docs'))->create();

// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
// // /////////////////////////////////////////////////////////////////////////////
// Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
// // /////////////////////////////////////////////////////////////////////////////
// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
