<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Uni2701\Venue;
use App\Models\Uni2701\Beer;
use App\Models\Uni2701\MyBeer;
use App\Models\Uni2701\MyBeerVenue;

class Uni2701Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // beers
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

        // venues
        Venue::create(['name' => 'Runcorn Tavern', 'address' => '124 Gowan Rd, Sunnybank Hills QLD 4109']);
        Venue::create(['name' => 'Souths Sports Club', 'address' => '174 Mortimer Rd, Acacia Ridge QLD 4110']);
        Venue::create(['name' => 'Rocklea Hotel', 'address' => '1337 Ipswich Rd, Rocklea QLD 4106']);
        Venue::create(['name' => 'Greenbank RSL', 'address' => '54 Anzac Ave, Hillcrest QLD 4118']);
        Venue::create(['name' => 'Calamvale Hotel', 'address' => '678 Compton Rd, Calamvale QLD 4116']);
        Venue::create(['name' => 'Sunnybank Hotel', 'address' => '275 McCullough St, Sunnybank QLD 4109']);
        Venue::create(['name' => 'Lucky Star Tavern', 'address' => '397 Hellawell Rd, Sunnybank Hills QLD 4109']);
        Venue::create(['name' => 'Acacia Ridge Hotel', 'address' => '1386 Beaudesert Rd, Acacia Ridge QLD 4110']);

        // my-beers
        MyBeer::factory(5)->create();
        MyBeerVenue::factory(15)->create();
    }
}
