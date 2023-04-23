<?php

namespace Database\Seeders;

use App\Models\Uni2701\Beer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beer::create(['name' => 'Carlton Dry', 'image' => 'carlton-dry.jpg']);
        Beer::create(['name' => 'Coopers Dark', 'image' => 'coopers-dark.jpg']);
        Beer::create(['name' => 'Great Northern', 'image' => 'great-northern.jpg']);
        Beer::create(['name' => 'Hahn Premium Light', 'image' => 'hahn-premium-light.jpg']);
        Beer::create(['name' => 'Hahn Super Dry', 'image' => 'hahn-super-dry.jpg']);
        Beer::create(['name' => 'Heineken', 'image' => 'heineken.jpg']);
        Beer::create(['name' => 'Stone and Wood', 'image' => 'stone-and-wood.jpg']);
        Beer::create(['name' => 'Tooheys Extra Dry', 'image' => 'tooheys-extra-dry.jpg']);
        Beer::create(['name' => 'Tooheys New', 'image' => 'tooheys-new.jpg']);
        Beer::create(['name' => 'Victoria Bitter', 'image' => 'victoria-bitter.jpg']);
        Beer::create(['name' => 'XXXX Bitter', 'image' => 'xxxx-bitter.jpg']);
        Beer::create(['name' => 'XXXX Gold', 'image' => 'xxxx-gold.jpg']);
    }
}
