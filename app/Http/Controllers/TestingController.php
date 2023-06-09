<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function timer()
    {
        $startDate = Carbon::create(2023, 6, 11, 0, 0, 0);
        $endDate = Carbon::create(2023, 6, 12, 20, 0, 0);
        $currentDate = Carbon::now();
        $price = 1500;


        // dd($startDate->toDateString());
        if ($currentDate >= $startDate && $currentDate <= $endDate) {
            $discountedPrice = $price * 0.9;
        } else {
            $discountedPrice = $price;
        }

        return view('dev', compact('price', 'discountedPrice', 'currentDate',  'startDate',  'endDate'));
    }
}
