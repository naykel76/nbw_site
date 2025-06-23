<?php

use App\Livewire\ExampleForm;
use App\Livewire\UserProfileForm;
use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;
use Naykel\Postit\Http\Controllers\ShowPostController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Route::get('/livewire-examples', function () {
//     return view('pages.livewire-examples', ['pageTitle' => 'Livewire Examples']);
// })->name('lwe');

Route::get('/form-example', UserProfileForm::class)->name('form-example');
Route::get('/form-example', ExampleForm::class)->name('form-example');

(new RouteBuilder('nav-alpine', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-gotime', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-jtb', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-laravel', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-livewire', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-main'))->create();
(new RouteBuilder('nav-postit', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-programming', 'components.layouts.docs-default'))->create();
(new RouteBuilder('nav-tutorials', 'components.layouts.docs-default'))->create();

// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
// // /////////////////////////////////////////////////////////////////////////////
// Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
// // /////////////////////////////////////////////////////////////////////////////
// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
