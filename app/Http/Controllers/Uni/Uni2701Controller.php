<?php

namespace App\Http\Controllers\Uni;

use App\Http\Controllers\Controller;
use Carbon\Carbon;


class Uni2701Controller extends Controller
{

    public function show()
    {

        $myBeers = \App\Models\Uni2701\MyBeer::join('beers', 'beers.id', 'my_beers.beer_id')
            ->select('my_beers.beer_id', 'my_beers.is_favourite', 'beers.name as name', 'beers.image as image')
            ->get();

        $myBeerVenues = \App\Models\Uni2701\MyBeerVenue::join('venues', 'venues.id', 'my_beer_venues.venue_id')
            ->select('venues.name', 'my_beer_venues.price', 'my_beer_venues.my_beer_id')->orderBy('my_beer_venues.my_beer_id')
            ->get();

        return view('uni.2701')->with([
            'venues' => \App\Models\Uni2701\Venue::all(),
            'beers' => \App\Models\Uni2701\Beer::all(),
            'myBeers' => $myBeers,
            'myBeerVenues' => $myBeerVenues,
            'dates' => $this->generate100RandomDates()
        ]);
    }

    public function generate100RandomDates()
    {
        $dates = [];

        for ($i = 0; $i < 100; $i++) {
            $d = Carbon::today()->subDays(rand(0, 365))->format('y-m-d');
            $dates[] = ['date' => $d, 'venue_id' => rand(1, 8)];
        }

        $dates = collect($dates)->sortBy('date');
        $dates = $dates->toArray();
        $dates = array_values($dates);

        return $dates;
    }
}
