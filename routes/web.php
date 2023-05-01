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

Route::get('/2701', function () {

    $myBeers = \App\Models\Uni2701\MyBeer::join('beers', 'beers.id', 'my_beers.beer_id')
        ->select('my_beers.beer_id', 'my_beers.is_favourite', 'beers.name as name', 'beers.image as image')
        ->get();

    $myBeerVenues = \App\Models\Uni2701\MyBeerVenue::join('venues', 'venues.id', 'my_beer_venues.venue_id')
        ->select('venues.name','my_beer_venues.price', 'my_beer_venues.my_beer_id')->orderBy('my_beer_venues.my_beer_id')
        ->get();


    return view('uni.2701')->with([
        'venues' => \App\Models\Uni2701\Venue::all(),
        'beers' => \App\Models\Uni2701\Beer::all(),
        'myBeers' => $myBeers,
        'myBeerVenues' => $myBeerVenues,
        // 'myBeerVenues' => \App\Models\Uni2701\MyBeerVenue::all(),
    ]);
})->name('uni.2701');

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
