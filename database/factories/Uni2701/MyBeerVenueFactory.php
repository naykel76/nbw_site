<?php

namespace Database\Factories\Uni2701;

use App\Models\Uni2701\MyBeer;
use App\Models\Uni2701\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyBeerVenue>
 */
class MyBeerVenueFactory extends Factory
{

    public function definition(): array
    {
        return [
            'venue_id' => Arr::random(Venue::all()->pluck('id')->toArray()),
            'my_beer_id' => Arr::random(MyBeer::all()->pluck('id')->toArray()),
            'price' => $this->faker->randomFloat(2, 7, 11),

            // 'price' => ceil($this->faker->randomFloat(2, 5, 10.50) * 10) / 10,
        ];
    }
}
