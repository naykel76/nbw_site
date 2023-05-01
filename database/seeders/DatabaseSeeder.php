<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // create a list of items available in the items list
        // \App\Models\Uni2701\MyBeer::factory(10)->create();


        $this->call(Uni2701Seeder::Class);
    }
}
