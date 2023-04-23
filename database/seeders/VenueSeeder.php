<?php

namespace Database\Seeders;

use App\Models\Uni2701\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venue::create( ['name' => 'Runcorn Tavern', 'address' => '124 Gowan Rd, Sunnybank Hills QLD 4109'] );
        Venue::create(['name' => 'Souths Sports Club', 'address' => '174 Mortimer Rd, Acacia Ridge QLD 4110']);
        Venue::create(['name' => 'Rocklea Hotel', 'address' => '1337 Ipswich Rd, Rocklea QLD 4106']);
        Venue::create(['name' => 'Greenbank RSL', 'address' => '54 Anzac Ave, Hillcrest QLD 4118']);
        Venue::create(['name' => 'Calamvale Hotel', 'address' => '678 Compton Rd, Calamvale QLD 4116']);
        Venue::create(['name' => 'Sunnybank Hotel', 'address' => '275 McCullough St, Sunnybank QLD 4109']);
        Venue::create(['name' => 'Lucky Star Tavern', 'address' => '397 Hellawell Rd, Sunnybank Hills QLD 4109']);
        Venue::create(['name' => 'Acacia Ridge Hotel', 'address' => '1386 Beaudesert Rd, Acacia Ridge QLD 4110']);
    }
}
