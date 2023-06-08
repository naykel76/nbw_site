<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function timer()
    {
        $startDiscount = Carbon::create(2023, 6, 9, 15, 32, 0); // Start: 6 PM on the 10th of June
        $endDiscount = Carbon::create(2023, 6, 12, 20, 0, 0); // End: 8 PM on the 12th of June
        $currentDateTime = Carbon::now();
        $price = 1500;

        if ($currentDateTime >= $startDiscount && $currentDateTime <= $endDiscount) {
            $discountedPrice = $price * 0.9;
        } else {
            $discountedPrice = $price;
        }

        return view('dev', compact('price', 'discountedPrice', 'currentDateTime',  'startDiscount', 'endDiscount'));
    }
}
