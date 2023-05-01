<?php

namespace Database\Factories\Uni2701;

use App\Models\Uni2701\Beer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uni2701\MyBeer>
 */
class MyBeerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $beerId = Arr::random(Beer::all()->pluck('id')->toArray());

        return [
            'beer_id' => $beerId,
            'is_favourite' => (rand(1,9) > 7)
        ];
    }
}
